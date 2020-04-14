<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>
	Je suis le header à include (inclure le head aussi)
	<ul>
		<li><a href="index.php">Index</a></li>
   		<li><a href="partenaires.php">Nos partenaires</a></li>
   		<li><a href="gagner-argent.php">Gagner de l'argent</a></li>
   		<li><a href="contacte.php">Contacte</a></li>
	</ul>

<form class="form-recherche-2" method="GET" action="recherche.php">
	<input id="input-recherche" type="text" minlength="1" name="recherche" placeholder="Recherche">
	<button id="bouton-recherche" type="submit" name="submit">recherche</button>
</form>

</header>
