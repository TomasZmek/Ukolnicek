<?php
//zobrazeni obsahu 
function obsah()
{
	if (isset($_GET['ukoly']))
	{
		dokoncitUkol();
		ukolDetail();
	}
	elseif (isset($_GET['seznam']))
	{
		zobrazSeznam();
	}
	else {
		zobrazUkoly();
	}
}
