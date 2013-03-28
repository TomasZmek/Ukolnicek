<?php
/*
 * Soubor nastavení pro úkolovníček
 */

//připojení k databázi pomocí dibi
require_once 'dibi.min.php'; 
dibi::connect(array(
	    'driver' => 'mysql',
	    'host' => 'localhost',
	    'username' => 'root',
	    'password' => '',
	    'database' => 'ukolnicek',
	    'charset' => 'utf8'
	));
// získání nastavení vzhledu
include_once dirname(__FILE__). '/../vzhled/header.php';
include_once dirname(__FILE__). '/../vzhled/obsah.php';
include_once dirname(__FILE__). '/../vzhled/footer.php';
include_once dirname(__FILE__). '/../vzhled/sidebar.php';

// načetení dalších knihoven
include_once dirname(__FILE__). '/uzivatele.php';
include_once dirname(__FILE__). '/autorizace.php';
include_once dirname(__FILE__). '/seznamy.php';
include_once dirname(__FILE__). '/ukoly.php';
include_once dirname(__FILE__).'/texy.php';

?>
