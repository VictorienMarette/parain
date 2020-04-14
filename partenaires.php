<?php
	include_once("includes/modules/header.php");
?>


<div class="container_list_partner">

	<?php  
		include_once("includes/end/dph.php");


		$nb_obj_par_page = 2;

		$nb_page = 1;
		if (isset($_GET['nb_page'])) {
			$nb_page = $_GET['nb_page'];
		}


		echo "<ul>";
		$sql = "SELECT * FROM tags";
		$result = mysqli_query($conn, $sql);
		$resultChek = mysqli_num_rows($result);
		
		if ($resultChek == 1) {
			$row = mysqli_fetch_assoc($result);
			$aryTag = explode(",", $row['tag']);
			foreach ($aryTag as $tag) {
				echo '<li><a href="partenaires.php?tag='.$tag.'">'.$tag.'</a></li>';
			}
		}

		echo '<li><a href="partenaires.php">pas de tag</a></li>
		</ul>';

		if (isset($_GET['tag'])) {
			$tag = mysqli_real_escape_string($conn, $_GET['tag']);

			$sql = "SELECT * FROM partenaires WHERE p_categories LIKE '%$tag%'";
		}else{
			$sql = "SELECT * FROM partenaires";
		}


		$result = mysqli_query($conn, $sql);
		$resultChek = mysqli_num_rows($result);

		$nb_objet_passer =1;
		$obj_plis_bas = False;
		$obj_plus_haut = False;

		while ($row = mysqli_fetch_assoc($result)) {
			if ($nb_objet_passer > ($nb_page-1)*$nb_obj_par_page && $nb_objet_passer <= $nb_obj_par_page*$nb_page ) {
				if (file_exists("image telecharge/partenaire/".$row['p_id'].".png")) {
					echo '<div class="container_img_partner">
						<a href="page-partenaire.php?id='.$row['p_id'].'"><img class="img_partner" src="image telecharge/partenaire/'.$row['p_id'].'.png"></a>
					</div>';
				}else if (file_exists("image telecharge/partenaire/".$row['p_id'].".jpeg")) {
					echo '<div class="container_img_partner">
						<a href="page-partenaire.php?id='.$row['p_id'].'"><img class="img_partner" src="image telecharge/partenaire/'.$row['p_id'].'.jpeg"></a>
					</div>';
				}
			}else if ($nb_objet_passer <= ($nb_page-1)*$nb_obj_par_page) {
				$obj_plis_bas = True;
			}else if ($nb_objet_passer > $nb_obj_par_page*$nb_page ) {
				$obj_plus_haut = True;
			}	
			$nb_objet_passer += 1;	
		}

		if ($obj_plis_bas == True) {
			if (isset($_GET['tag'])) {
				echo '<a href="partenaires.php?tag='.htmlspecialchars($_GET['tag']).'&nb_page='.htmlspecialchars($nb_page-1).'">précédant</a>';
			}else{
				echo '<a href="partenaires.php?nb_page='.htmlspecialchars($nb_page-1).'">précédant</a>';
			}
		}
		if ($obj_plus_haut == True) {
			if (isset($_GET['tag'])) {
				echo '<a href="partenaires.php?tag='.htmlspecialchars($_GET['tag']).'&nb_page='.htmlspecialchars($nb_page+1).'">Suivant</a>';
			}else{
				echo '<a href="partenaires.php?nb_page='.htmlspecialchars($nb_page+1).'">Suivant</a>';
			}
		}
	?>
</div>

<?php
	include_once("includes/modules/footer.php");
?>