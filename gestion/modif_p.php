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
	echo '<b>Index: '.$id.'</b>';

	include_once("../includes/end/dph.php");
	$sql = "SELECT * FROM partenaires WHERE p_id='$id'";
	$result = mysqli_query($conn, $sql);
	$resultChek = mysqli_num_rows($result);

	if ($resultChek == 1) {
		$row = mysqli_fetch_assoc($result);
		echo '<form method="POST" action="end/p_modif.php">
			<input type="hidden" name="p_id" value="'.$row['p_id'].'">
			<input type="text" name="p_categories" placeholder="categories" value="'.$row['p_categories'].'">
			<input type="text" name="p_des" placeholder="description" value="'.$row['p_description'].'">
			<input type="text" name="p_lien" placeholder="lien" value="'.$row['p_lien'].'">
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