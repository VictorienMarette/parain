<!DOCTYPE html>
<html>
<head>
	<title>gestion</title>
</head>
<body>
<?php  
include_once("../includes/end/dph.php");
echo '<div><p>Tags<p>';

$sql = "SELECT * FROM tags";
$result = mysqli_query($conn, $sql);
$resultChek = mysqli_num_rows($result);
$tags = "";
if ($resultChek == 1) {
	$row = mysqli_fetch_assoc($result);
	$tags = $row['tag'];
}
echo '<form class="form-recherche-2" method="POST" action="end/tag_c.php">
	<input id="input-recherche" type="text" minlength="1" name="new_tags" value="'.$tags.'">
	<button id="bouton-recherche" type="submit" name="submit">update</button>
</form>';
echo '</div>';
echo '<div><p>Partenaires<p>';
echo '<form class="" method="GET" action="index.php">
	<input id="input-recherche" type="text" minlength="1" name="recherche_p" placeholder="Recherche">
	<button id="bouton-recherche" type="submit" name="submit">recherché</button>
</form>';
echo '<form class="" method="POST" action="end/nv.php">
	<input type="hidden" name="poug" value="p">
	<button id="bouton-recherche" type="submit" name="submit">nouveau</button>
</form>';
$recherche_p = "";

if (isset($_GET['recherche_p'])) {
	$recherche_p = $_GET['recherche_p'];
}

$sql = "SELECT * FROM partenaires WHERE p_lien LIKE '%$recherche_p%'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
	echo "<div><b>";
	echo $row['p_lien']."  ";
	echo "</b>";
	echo '<a href="modif_p.php?id='.$row['p_id'].'">modifier</a></div>';
}
echo '</div>';

echo '<div><p>Liens<p>';
echo '<form class="" method="GET" action="index.php">
	<input id="input-recherche" type="text" minlength="1" name="recherche_l" placeholder="Recherche">
	<button id="bouton-recherche" type="submit" name="submit">recherché</button>
</form>';
echo '<form class="" method="POST" action="end/nv.php">
	<input type="hidden" name="poug" value="g">
	<button id="bouton-recherche" type="submit" name="submit">nouveau</button>
</form>';

$recherche_l = "";

if (isset($_GET['recherche_l'])) {
	$recherche_l = $_GET['recherche_l'];
}

$sql = "SELECT * FROM gArgent WHERE g_lien LIKE '%$recherche_l%'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
	echo "<div><b>";
	echo $row['g_lien']."  ";
	echo "</b>";
	echo '<a href="modif_g.php?id='.$row['g_id'].'">modifier</a></div>';
}
echo '</div>';
?>
</body>
</html>