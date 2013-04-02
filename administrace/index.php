<?php

session_start();
require_once '../knihovny/nastaveni.php';

if (over())
{	odhlaseni();
	hlavicka();
	if (opravneni())
	{
	
	adminmenu();
	administrace();
	paticka();
	}
	else echo "Nemáš oprávnění";
	
	
}
else {
	header("location: /ukolnicek/prihlaseni.php");
}

?>