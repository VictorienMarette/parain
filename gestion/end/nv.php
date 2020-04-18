<?php
if (isset($_POST['poug'])) {
	error_reporting(E_ALL); 
	ini_set('display_errors', 'On');
	include_once("../../includes/end/dph.php");

	if ($_POST['poug'] == 'p') {
		$sql = "INSERT INTO partenaires (p_lien, g_indic) VALUES ('nouveau', '0');";
		$result = mysqli_query($conn, $sql);
	}elseif ($_POST['poug'] == 'g') {
		$sql = "INSERT INTO gArgent (g_lien, g_indic) VALUES ('nouveau', '1');";
		$result = mysqli_query($conn, $sql);
	}
	if(!$result){
    	echo(mysqli_error($conn));
	} 
	echo $_POST['poug'];

}else{
	echo "caca";
}
//header('Location: ../index.php');
