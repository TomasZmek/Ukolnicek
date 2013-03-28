<?php
session_start();
require_once 'knihovny/nastaveni.php';
hlavicka();
if (over())
{
	sidebar();
	dokoncitUkol();
	ukolDetail();
	
}
else {
	prihlaseni();
}
paticka();
?>