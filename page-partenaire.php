<?php
	include_once("includes/modules/header.php");
?>

<?php  
	if (isset($_GET['id'])) {
		include_once("includes/end/dph.php");
		$id = mysqli_real_escape_string($conn, $_GET['id']);

		$sql = "SELECT * FROM partenaires WHERE p_id='$id'";
		$result = mysqli_query($conn, $sql);
		$resultChek = mysqli_num_rows($result);

		if ($resultChek == 1) {
			$row = mysqli_fetch_assoc($result);

			if (file_exists("image telecharge/partenaire/".$id.".png")) {
				echo '<div class="container_img_partner_page">
					<img class="img_partner_page" src="image telecharge/partenaire/'.$id.'.png">
				</div>';
			}else if (file_exists("image telecharge/partenaire/".$id.".jpeg")) {
				echo '<div class="container_img_partner_page">
					<img class="img_partner_page" src="image telecharge/partenaire/'.$id.'.jpeg">
				</div>';
			}

			echo '<p class="description_partner_page">
				'.$row['p_description'].'
				</p>';

			echo '<a href="'.$row['p_lien'].'">'.$row['p_lien'].'</a>';

		}else{
			header("Location: partenaires.php");
		}

	}else{
		header("Location: partenaires.php");
	}
?>


<?php
	include_once("includes/modules/footer.php");
?>