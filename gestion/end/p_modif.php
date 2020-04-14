<?php
if (isset($_POST['submit'])) {
	$id = $_POST['p_id'];
	$cat = $_POST['p_categories'];
	$des = $_POST['p_des'];
	$lien = $_POST['p_lien'];

	include_once("../../includes/end/dph.php");
	$sql = "UPDATE partenaires SET p_categories='$cat', p_description='$des', p_lien='$lien' WHERE p_id = '$id'";
	$result = mysqli_query($conn, $sql);

	header('Location: ../modif_p.php?id='.$_POST['p_id']);
}else{
	header("Location: ../index.php");
	exit();
}