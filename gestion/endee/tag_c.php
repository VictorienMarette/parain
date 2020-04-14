<?php
if (isset($_POST['submit'])) {
	$nv = $_POST['new_tags'];

	include_once("../../includes/end/dph.php");
	$sql = "UPDATE tags SET tag='$nv'";
	$result = mysqli_query($conn, $sql);

	header("Location: ../index.php");
}else{
	header("Location: ../index.php");
	exit();
}