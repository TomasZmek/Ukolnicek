<?php
session_start();
require_once '../knihovny/nastaveni.php';
hlavicka();
if (over())
{
?>
<div id ="obsah">
	<h1>Přidat uživatele</h1>
	<ul>
		<li><a href="uzivatel.php">Zpět na seznam uživatelů</a></li>
	</ul>
				<form name="pridatu" method="POST">
					<fieldset>
						<label for="jmeno">Jméno:</label>
						<input name="jmeno" id="jmeno" type="text" value="" />
						<br />
						<label for="email">E-mail:</label>
						<input name="email" id="email" type="email" value="" />
						<br />
						<label for="heslo">Zadejte heslo:</label>
						<input name="heslo" id="heslo" type="password" />
						<br />
						<label for="heslo2">Zopakujte heslo:</label>
						<input name="heslo2" id="heslo2" type="password" />
						<br />
						<input name="pridatu" type="submit" value="Přidat uživatele" />
					</fieldset>
				</form>
			</div>
<?php pridej();
}
else {
	prihlaseni();
} 
paticka();
?>

