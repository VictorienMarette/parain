<!DOCTYPE html>
<html>
<head>
	<title>modif</title>
</head>
<body>
<?php  
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	echo '<div>';
	include_once("../includes/end/dph.php");
	$sql = "SELECT * FROM gArgent WHERE g_id='$id'";
	$result = mysqli_query($conn, $sql);
	$resultChek = mysqli_num_rows($result);

	if ($resultChek == 1) {
		$row = mysqli_fetch_assoc($result);
		echo '<form method="POST" action="end/g_modif.php">
			<input type="hidden" name="g_id" value="'.$row['g_id'].'">
			<input type="text" name="g_categories" placeholder="categories" value="'.$row['g_categories'].'">
			<input type="text" name="g_des" placeholder="description" value="'.$row['g_description'].'">
			<input type="text" name="g_lien" placeholder="lien" value="'.$row['g_lien'].'">
			<input type="text" name="g_prix" placeholder="prix" value="'.$row['g_prix'].'">
			<input type="text" name="g_paypal" placeholder="paypal" value="'.$row['g_paypal'].'">
			<button type="submit" name="submit">Modifier</button>
		</form>';

	}

	echo '</div>';
	echo '<a href="index.php">retour</a>';
}else {
	echo '<a href="index.php">retour</a>';
}
?>
</body>
</html>