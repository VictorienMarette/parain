<?php
	include_once("includes/modules/header.php");
?>


<div class="container_list_subscribe">
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
				echo '<li><a href="gagner-argent.php?tag='.$tag.'">'.$tag.'</a></li>';
			}
		}

		echo '<li><a href="gagner-argent.php">pas de tag</a></li>
		</ul>';

		if (isset($_GET['tag'])) {
			$tag = mysqli_real_escape_string($conn, $_GET['tag']);

			$sql = "SELECT * FROM gArgent WHERE g_categories LIKE '%$tag%'";
		}else{
			$sql = "SELECT * FROM gArgent";
		}


		$result = mysqli_query($conn, $sql);
		$resultChek = mysqli_num_rows($result);

		$nb_objet_passer =1;
		$obj_plis_bas = False;
		$obj_plus_haut = False;

		while ($row = mysqli_fetch_assoc($result)) {
			if ($nb_objet_passer > ($nb_page-1)*$nb_obj_par_page && $nb_objet_passer <= $nb_obj_par_page*$nb_page ) {
				echo '	<div class="container_subscribe">';

				if (file_exists("image telecharge/gargent/".$row['g_id'].".png")) {
					echo '<div class="container_img_subscribe">
							<img class="img_subscribe" src="image telecharge/gargent/'.$row['g_id'].'.png">
						</div>';
				}else if (file_exists("image telecharge/gargent/".$row['g_id'].".jpeg")) {
					echo '<div class="container_img_subscribe">
							<img class="img_subscribe" src="image telecharge/gargent/'.$row['g_id'].'.jpeg">
						</div>';
				}
				echo'<div class="info_product">
							<a href="page_gagner-argent.php?id='.$row['g_id'].'" class="title_product">
								'.$row['g_lien'].'
							</a>
							<h3 class="price_product">
							'.$row['g_prix'].'
							</h3>
						</div>
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
							<input type="hidden" name="cmd" value="_s-xclick">
							<input type="hidden" name="hosted_button_id" value="'.$row['g_paypal'].'">
							<input class="button_subscribe" type="submit" value="Acheter" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
						</form>
				</div>';

			}else if ($nb_objet_passer <= ($nb_page-1)*$nb_obj_par_page) {
				$obj_plis_bas = True;
			}else if ($nb_objet_passer > $nb_obj_par_page*$nb_page ) {
				$obj_plus_haut = True;
			}	
			$nb_objet_passer += 1;	
			
		}

		if ($obj_plis_bas == True) {
			if (isset($_GET['tag'])) {
				echo '<a href="gagner-argent.php?tag='.htmlspecialchars($_GET['tag']).'&nb_page='.htmlspecialchars($nb_page-1).'">précédant</a>';
			}else{
				echo '<a href="gagner-argent.php?nb_page='.htmlspecialchars($nb_page-1).'">précédant</a>';
			}
		}
		if ($obj_plus_haut == True) {
			if (isset($_GET['tag'])) {
				echo '<a href="gagner-argent.php?tag='.htmlspecialchars($_GET['tag']).'&nb_page='.htmlspecialchars($nb_page+1).'">Suivant</a>';
			}else{
				echo '<a href="gagner-argent.php?nb_page='.htmlspecialchars($nb_page+1).'">Suivant</a>';
			}
		}
	?>


</div>
<?php
	include_once("includes/modules/footer.php");
?>