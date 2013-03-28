<?php
session_start();
require_once '../knihovny/nastaveni.php';
hlavicka();
if (over())
{
?>

<div id="obsah">
	<h1>Správa uživatelů</h1>
	<ul>
		<li><a href="novyuzivatel.php">Přidat uživatele</a></li>
	</ul>
	
		<?php smazUzivatele(); 
		vypsatUzivatele(); ?>
	
</div>
<?php
paticka();
}
else {
	prihlaseni();
} 

?>