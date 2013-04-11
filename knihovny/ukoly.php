<?php
/*
 * Funkce týkající se úkolů - přidávání úkolů
 */
 
include_once ('nastaveni.php');
// funkce, ktera provede zapis dat do databaze - prida ukol
function pridejUkol()
{   $jmeno = $_POST['jmeno'];
	$popis = $_POST['popis'];
	$datump = date("Y-m-d H:i:s");
	$datumd = $_POST['datumd'];
	$uzivatel = $_POST['uzivatel'];
	$seznam = $_POST['seznam'];
	$hodnoty = array('ukol_jmeno'=> $jmeno, 'ukol_popis'=>$popis, 'ukol_datumV'=>$datump, 'ukol_datumD'=>$datumd, 'ukol_uzivatel'=>$uzivatel, 'ukol_seznam'=>$seznam);
	dibi::query('INSERT INTO [ukoly]', $hodnoty);
}
// funkce pro odeslani mailu
function poslatmail()
{
	$texy = new Texy();
	$texy->process($_POST['popis']);
	$datumd = $_POST['datumd'];
	$uzivatel = $_POST['uzivatel'];
	$seznam = $_POST['seznam'];
	$dotaz = dibi::select("uzivatel_email")
				->from("uzivatele")
				->where("uzivatel_id=%i",$uzivatel)
				->fetchSingle();
	$telo = $texy->process($_POST['popis']);
	$subject = "Nový úkol: ".$_POST['jmeno'];

	$headers = "From: ukolnicek@zrnek.cz \r\n";
	$headers .= "Reply-To: info@zrnek.cz \r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=utf-8\r\n";
	$message = '<html><body>';
	$message .= '<img src="http://blog.flamingtext.com/blog/2013/04/10/flamingtext_com_1365602752_176921550.png" border="0" alt="Logo Design by FlamingText.com" title="Logo Design by FlamingText.com" />';
	$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
	$message .= "<tr style='background: #eee;'><td><strong>Název úkolu:</strong> </td><td>" . $_POST['jmeno'] . "</td></tr>";
	$message .= "<tr><td><strong>Termín:</strong> </td><td>" . $datumd . "</td></tr>";
	$message .= "<tr><td><strong>Popis:</strong> </td><td>" . $telo . "</td></tr>";
	$message .= "</table>";
	$message .= "</body></html>";
	if( mail($dotaz, $subject, $message, $headers) )
    {echo 'OK - mail odeslán';}
	else
    {echo 'CHYBA - odeslání se nepovedlo';}
	}
// validace dat z formulare pro pridani ukolu
function pridatukol()
{
	if (isset ($_POST['pridatU']))
	{
		$jmeno = $_POST['jmeno'];
		$popis = $_POST['popis'];
		$datumd = $_POST['datumd'];
		$uzivatel = $_POST['uzivatel'];
		$seznam = $_POST['seznam'];
		if ($jmeno == NULL)
		{
			echo "Je nutné zadat název úkolu";
		}
		elseif ($popis == NULL)
		{
			echo "Je nutné zadat nějaký popis";
		}
		else pridejUkol ();
	}
}
// formular pro pridani ukolu
function formularPridatU()
{
?>
<h3>Přidat úkol</h3>
<form id="pridatUkol" name="pridatUkol" method="POST">
	<label for="jmeno">Název úkolu:</label>
	<input type="text" name="jmeno" id="jmeno" />
	<br />
	<label for="seznamUkolu">Seznam úkolů:</label><?php seznamUkolu(); ?><br />
	<label for="kalendar">Termín dokončení:</label>
	<input type="kalendar" name="datumd" id="kalendar" />
	<br />
	<label for="uzivatel">Zpracovatel úkolu:</label><?php zobrazUzivatele(); ?><br />
	<label for="popis">Popis úkolu:</label>
	<br />
	<textarea name="popis" id="popis" cols="50" rows="10"></textarea>
<br />	<input type="submit" name="pridatU" value="Přidat Úkol" />
</form>
<?php
pridatUkol(); // zavola funkci pro pridani ukolu
}
// vypsani ukolu
function zobrazUkoly()
{
$uzivatel = $_SESSION['prihlaseny_id'];
$dotaz = dibi::select('*')
->from('ukoly')
->join('uzivatele')
->on('ukol_uzivatel = uzivatel_id')
->join('seznam')
->on('ukol_seznam = seznam_id')
->where('ukol_hotovo=%i', '0')// podminka, ze ukol musi byt nesplneny. Jinak se nevypise
->where('ukol_uzivatel=%i',$uzivatel) // podminka urcuje ze se vypisou ukoly jen konkretniho uzivatele
->fetchAll();
$pocetU = count($dotaz);

if($pocetU == 0) // zjisteni kolik je pridano ukolu. Pokud 0 vypise se hlaska
{
echo '<div id="content"><h2>Úkoly</h2>
<strong>Žádné úkoly, nebyly zatím přidány</strong><br />';
formularPridatU();
echo '</div>';
}// Pokud je uz nejaky ukol pridan, tak se zobrazi tabulka s ukolama
else { 
?>
<div id="content"><h2>Úkoly</h2>
<table>
<tr>
<th><strong>Jméno úkolu</strong></th><th><strong>Zpracovatel</strong></th><th><strong>Seznam</strong></th><th><strong>Termín</strong></th>
</tr>
<?php
foreach ($dotaz as $radek) {
?>
<tr>
<th><?php echo '<a href="index.php?ukoly=' . $radek['ukol_id'] . '">' . htmlspecialchars($radek['ukol_jmeno']) . '</a>'; ?>
	<th><?php echo htmlspecialchars($radek['uzivatel_jmeno']); ?></th><th><?php echo $radek['seznam_jmeno'] ?></th><th><?php echo date("d.m.Y", strtotime($radek['ukol_datumD'])); ?></th>
</tr>
<?php
}
echo '</table>';
formularPridatU(); // prida na stranku formular pro pridani ukolu (asi to do budoucna zmenim a bude to na nove strance)
echo '</div>';
}
}
//vypsani ukolu dle zadani seznamu
function zobrazSeznam(){
$seznam = $_GET['seznam'];
$uzivatel = $_SESSION['prihlaseny_id'];
$dotaz = dibi::select('*')
->from('ukoly')
->join('uzivatele')
->on('ukol_uzivatel = uzivatel_id')
->join('seznam')
->on('ukol_seznam = seznam_id')
->where('ukol_hotovo=%i', '0')
->where('ukol_seznam=%i', $seznam) // podminka, ze ukol musi byt nesplneny. Jinak se nevypise
->where('ukol_uzivatel=%i', $uzivatel)
->fetchAll();
$pocetU = count($dotaz);

if($pocetU == 0) // zjisteni kolik je pridano ukolu. Pokud 0 vypise se hlaska
{
echo '<div id="content"><h2>Úkoly</h2>
<strong>Žádné úkoly, nebyly zatím přidány</strong><br />';
formularPridatU();
echo '</div>';
}// Pokud je uz nejaky ukol pridan, tak se zobrazi tabulka s ukolama
else { 
?>
<div id="content"><h2>Úkoly</h2>
<table>
<tr>
<th><strong>Jméno úkolu</strong></th><th><strong>Zpracovatel</strong></th><th><strong>Seznam</strong></th><th><strong>Termín</strong></th>
</tr>
<?php
foreach ($dotaz as $radek) {
?>
<tr>
<th><?php echo '<a href="index.php?ukoly=' . $radek['ukol_id'] . '">' . htmlspecialchars($radek['ukol_jmeno']) . '</a>'; ?>
	<th><?php echo htmlspecialchars($radek['uzivatel_jmeno']); ?></th><th><?php echo $radek['seznam_jmeno'] ?></th><th><?php echo date("d.m.Y", strtotime($radek['ukol_datumD'])); ?></th>
</tr>
<?php
}
echo '</table>';
formularPridatU(); // prida na stranku formular pro pridani ukolu (asi to do budoucna zmenim a bude to na nove strance)
echo '</div>';
}
}
// Vypsani detailu ukolu
function ukolDetail()
{
	if (isset ($_GET['ukoly']))
	{	$texy = new Texy();
		$id = $_GET['ukoly'];
		$dotaz = dibi::select('*')
				->from('ukoly')
				->where('ukol_id=%i',$id)
				->join('uzivatele')
				->on('ukol_uzivatel = uzivatel_id')
				->join('seznam')
				->on('ukol_seznam = seznam_id')
				->fetchAll();
foreach ($dotaz as $radek) 
{
?>
<div id="content"><h2>Detail úkolu</h2>
<table>
<tr>
<th><strong>Jméno úkolu</strong></th><th><strong>Zpracovatel</strong></th><th><strong>Seznam</strong></th><th><strong>Termín</strong></th><th><strong>Akce</strong></th>
</tr>
<th><?php echo htmlspecialchars($radek['ukol_jmeno']); ?>
<th><?php echo htmlspecialchars($radek['uzivatel_jmeno']); ?></th><th><?php echo htmlspecialchars($radek['seznam_jmeno']); ?></th><th><?php echo date("d.m.Y", strtotime($radek['ukol_datumD'])); ?></th>
<th><?php 
	if ($radek['ukol_hotovo']==NULL)
{
 echo '<form method="POST"><input type="submit" name="dokoncit" value="Dokončit"/></form></th>';
}
else echo '<strong>DOKONČEN</strong></th>';
?>
</tr>
</table>
<div>
<h4>Popis úkolu:</h4>
<?php echo $texy->process($radek['ukol_popis']) ?>
</div>
</div>
<?php
}
	}
else echo 'Nastala neočekávaná chyba';
}

// funkce pro dokonceni ukolu
function dokoncitUkol()
{
	if (isset ($_POST['dokoncit']))
	{
		$id = $_GET['ukoly'];
		$hotovo = '1';
		dibi::query("UPDATE [ukoly] SET [ukol_hotovo]=%i", $hotovo, "WHERE [ukol_id]=%i",$id);
	}
}

?>
