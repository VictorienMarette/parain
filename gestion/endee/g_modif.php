<?php
if (isset($_POST['submit'])) {
	$id = $_POST['g_id'];
	$cat = $_POST['g_categories'];
	$des = $_POST['g_des'];
	$lien = $_POST['g_lien'];
	$prix = $_POST['g_prix'];
	$paypal = $_POST['g_paypal'];

	include_once("../../includes/end/dph.php");
	$sql = "UPDATE gArgent SET g_categories='$cat', g_description='$des', g_lien='$lien', g_prix='$prix', g_paypal='$paypal' WHERE g_id = '$id'";
	$result = mysqli_query($conn, $sql);

	header('Location: ../modif_g.php?id='.$_POST['g_id']);
}else{
	header("Location: ../index.php");
	exit();
}