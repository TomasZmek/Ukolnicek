<?php
//zobrazeni administrace 
function administrace()
{
	if (isset($_GET['pridat-uzivatele']))
	{
		uzivateleForm();
	}
	elseif (isset($_GET['uzivatel']))
	{
		upravUzivatele();
	}
	else {
		smazUzivatele(); 
		vypsatUzivatele();	
	}

}