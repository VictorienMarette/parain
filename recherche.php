<?php
	include_once("includes/modules/header.php");
?>
<?php 
if (isset($_GET['recherche'])) {
	include_once("includes/end/dph.php");

	$recherche = mysqli_real_escape_string($conn, $_GET['recherche']);


	$sql = "SELECT * FROM partenaires WHERE p_categories LIKE '%$recherche%' OR p_description LIKE '%$recherche%' 
	UNION SELECT g_id, g_lien, g_prix, g_paypal, g_indic FROM gArgent WHERE g_categories LIKE '%$recherche%' OR g_lien LIKE '%$recherche%' OR g_lien LIKE '%$recherche%'";

	$result = mysqli_query($conn, $sql);
	$resultChek = mysqli_num_rows($result);

	while ($row = mysqli_fetch_assoc($result)) {
		if ($row['g_indic'] == 0) {
			if (file_exists("image telecharge/partenaire/".$row['p_id'].".png")) {
				echo '<div class="container_img_partner">
					<a href="page-partenaire.php?id='.$row['p_id'].'"><img class="img_partner" src="image telecharge/partenaire/'.$row['p_id'].'.png"></a>
				</div>';
			}else if (file_exists("image telecharge/partenaire/".$row['p_id'].".jpeg")) {
				echo '<div class="container_img_partner">
					<a href="page-partenaire.php?id='.$row['p_id'].'"><img class="img_partner" src="image telecharge/partenaire/'.$row['p_id'].'.jpeg"></a>
				</div>';
			}	
		}else{
			echo '	<div class="container_subscribe">';

			if (file_exists("image telecharge/gargent/".$row['p_id'].".png")) {
				echo '<div class="container_img_subscribe">
						<img class="img_subscribe" src="image telecharge/gargent/'.$row['p_id'].'.png">
					</div>';
			}else if (file_exists("image telecharge/gargent/".$row['p_id'].".jpeg")) {
				echo '<div class="container_img_subscribe">
						<img class="img_subscribe" src="image telecharge/gargent/'.$row['p_id'].'.jpeg">
					</div>';
			}
			echo'<div class="info_product">
						<a href="page_gagner-argent.php?id='.$row['p_id'].'" class="title_product">
							'.$row['p_categories'].'
						</a>
						<h3 class="price_product">
						'.$row['p_description'].'
						</h3>
					</div>
					<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
						<input type="hidden" name="cmd" value="_s-xclick">
						<input type="hidden" name="hosted_button_id" value="'.$row['p_lien'].'">
						<input class="button_subscribe" type="submit" value="Acheter" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
					</form>
			</div>';
		}
	}

}else{
	header("Location: index.php");
}
?>
<?php
	include_once("includes/modules/footer.php");
?>