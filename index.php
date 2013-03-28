<?php
session_start();
require_once 'knihovny/nastaveni.php';

if (over())
{	odhlaseni();
	hlavicka();
	sidebar();
	obsah();
	
}
else {
	header("location: /ukolnicek/prihlaseni.php");
}
paticka();
?>
