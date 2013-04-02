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
				
			</div>
<?php pridej();
}
else {
	prihlaseni();
} 
paticka();
?>

