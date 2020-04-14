<?php
	include_once("includes/modules/header.php");
?>
<?php  
	if (isset($_GET['id'])) {
		include_once("includes/end/dph.php");
		$id = mysqli_real_escape_string($conn, $_GET['id']);

		$sql = "SELECT * FROM gArgent WHERE g_id='$id'";
		$result = mysqli_query($conn, $sql);
		$resultChek = mysqli_num_rows($result);

		if ($resultChek == 1) {
			$row = mysqli_fetch_assoc($result);

			if (file_exists("image telecharge/gargent/".$row['g_id'].".png")) {
				echo '<div class="container_subscribe_page">
				<div class="container_img_subscribe_page">
						<img class="img_subscribe_page" src="image telecharge/gargent/'.$row['g_id'].'.png">
					</div>';
			}else if (file_exists("image telecharge/gargent/".$row['g_id'].".jpeg")) {
				echo '<div class="container_subscribe_page">
				<div class="container_img_subscribe_page">
						<img class="img_subscribe_page" src="image telecharge/gargent/'.$row['g_id'].'.jpeg">
					</div>';
			}

			echo '<div class="info_product_page">
				<h2 class="title_product_page">
					'.$row['g_lien'].'
				</h2>
				<h3 class="price_product_page">
				'.$row['g_prix'].'
				</h3>

			</div>
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="'.$row['g_paypal'].'">
				<input class="button_subscribe" type="submit" value="Acheter" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
			</form>

			<p class="description_subscribe_page">
				'.$row['g_description'].'
			</p>

	</div>';

		}else{
			header("Location: gagner-argent.php");
		}

	}else{
		header("Location: gagner-argent.php");
	}
?>


<?php
	include_once("includes/modules/footer.php");
?>