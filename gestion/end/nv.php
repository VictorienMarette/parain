<?php
if (isset($_POST['poug'])) {
	include_once("../../includes/end/dph.php");
	if ($_POST['poug'] == 'p') {
		$sql = "INSERT INTO partenaires (p_lien, g_indic) VALUES ('nouveau', '0');";
		$result = mysqli_query($conn, $sql);
		$resultChek = mysqli_num_rows($result);
		echo $resultChek;
	}elseif ($_POST['poug'] == 'g') {
		$sql = "INSERT INTO gArgent (g_lien, g_indic) VALUES ('nouveau', '1');";
		$result = mysqli_query($conn, $sql);

		$resultChek = mysqli_num_rows($result);
		echo $resultChek;
	}

}
//header('Location: ../index.php');
