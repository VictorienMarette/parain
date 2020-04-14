<?php
	include_once("includes/modules/header.php");
?>
<form class="form-formulaire-contact-2" action="includes/end/formulairecontacte.php" method="POST">
	<h1 class="titre-formulaire-contact">Me contacter :</h1>
	<div class="conteneur-email-nom">
		<input class="input-formulaire-contact-2" type="email" name="email" minlength="5" maxlength="80" placeholder="Email" required>
	</div>
		<textarea class="textarea-formulaire-contact" placeholder="Ecris ton message..." name="message" minlength="5" maxlength="80000" required></textarea>
		<button class="button-formulaire-contact" type="submit" name="submit">Envoyer</button>
</form>
<?php
	include_once("includes/modules/footer.php");
?>