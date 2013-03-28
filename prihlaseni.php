<?php
session_start();
require_once 'knihovny/nastaveni.php';
prihlas();
hlavicka();
?>
<div id="obsah">
	<h2>Přihlášení</h2>
	<form name="prihlaseni" method="POST">
		<fieldset>
			<label for="email">E-mail:</label>
			<input name="email" id="email" type="text" value="" />
			<br />
			<label for="heslo">Heslo:</label>
			<input name="heslo" id="heslo" type="password" />
			<input name="prihlasit" type="submit" value="Přihlásit" />
		</fieldset>
	</form>
</div>
<?php paticka();?>