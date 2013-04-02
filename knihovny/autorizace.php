<?php

include_once ('nastaveni.php');
// prihlaseni uzivatele
function prihlas() {
	if (isset($_POST['prihlasit'])) {
		$email = $_POST['email'];
		$heslo = $_POST['heslo'];

		$dotaz = dibi::query('SELECT [uzivatel_id] FROM [uzivatele] WHERE [uzivatel_email]=%s OR [uzivatel_heslo]=%s', $email, otiskHesla($heslo));
		$id = $dotaz -> fetchSingle();
		
		if ($id == TRUE) {
			$_SESSION['prihlaseny_id'] = $id;
		header("location: /Ukolnicek/"); //tady to bude chtit vymyslet neco lepsiho
			
		}
		
	}
}
//overeni jestli je uzivatel prihlasen
function over() {
	if (isset($_SESSION['prihlaseny_id']))
		return TRUE;
	else
		return FALSE;
}
// otisk hesla
function otiskHesla($heslo) {
	$sul = "dkjsk4eřč3";
	$otisk = hash('sha512', $heslo . $sul);
	return $otisk;
}
// odhlaseni uzivatele
function odhlaseni()
{
if (isset($_GET['odhlasit']))
{
	session_destroy();
    header("location: /Ukolnicek/");
    exit;
}
}
//overeni jestli ma uzivatel potrebne opravneni
function opravneni()
{
	$id = $_SESSION['prihlaseny_id'];
	$dotaz = dibi::query('SELECT [uzivatel_opravneni] FROM [uzivatele] WHERE [uzivatel_id]=%i', $id);
	$opravneni = $dotaz->fetchSingle();	
	
	if ($opravneni=='admin')
	return TRUE;
	else 
		return FALSE;
}
