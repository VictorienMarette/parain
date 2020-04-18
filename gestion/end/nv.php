<?php
if (isset($_POST['poug'])) {
	include_once("../../includes/end/dph.php");
	if (mysqli_connect_errno($conn)) {
   
		echo "Failed to connect to MySQL: " . mysqli_connect_error($conn);
	}else{
		echo "Pas de pb PUUUUUUUTTTTTAIIIIIIIINNNNNNN";
	}
	if ($_POST['poug'] == 'p') {
		$sql = "INSERT INTO partenaires (p_lien, g_indic) VALUES ('nouveau', '0');";
		$result = mysqli_query($conn, $sql);
	}elseif ($_POST['poug'] == 'g') {
		$sql = "INSERT INTO gArgent (g_lien, g_indic) VALUES ('nouveau', '1');";
		$result = mysqli_query($conn, $sql);
	}
	echo $_POST['poug'];

}else{
	echo "caca";
}
//header('Location: ../index.php');
