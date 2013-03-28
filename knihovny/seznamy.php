<?php
include_once ('nastaveni.php');
function pridejSeznam()
{   $jmeno = $_POST['jmeno'];
	$hodnoty = array('seznam_jmeno'=> $jmeno);
	dibi::query('INSERT INTO [seznam]', $hodnoty);
	header("location: /ukolnicek/");
}
function pridatSeznam()
{
	if (isset ($_POST['pridatS']))
	{
		$jmeno = $_POST['jmeno'];
		if ($jmeno == NULL)
		{
			echo "Je nutné zadat název seznamu";
		}
		else pridejSeznam ();
	}
}
function formularPridatS()
{
?>
<div class="new-list-form">
<h3>Přidat seznam</h3>
<form id="pridatSeznam" name="pridatSeznam" method="POST">
	<input type="text" name="jmeno" /><br />
	<input type="submit" name="pridatS" value="Přidat" />
</form>
</div>
<?php
pridatSeznam();
}
function zobrazSeznamy()
{
	$dotaz = dibi::select("*")
				->from("seznam")
				->fetchAll();
	$pocetS = count($dotaz);
	
	if($pocetS == 0)
	{
		echo '<div class="task-list">
		<ul><li><a href="index.php">Domů</a></li>
		<li><a href="index.php?odhlasit">Odhlásit</a></li>
		
		</ul>
		<h2>Seznam úkolů</h2>
		<strong>Žádný seznam neexistuje</strong><br />';
		formularPridatS();
		echo '</div>';
	}
	else {
		echo '<div class="task-list">
		<ul><li><a href="index.php">Domů</a></li>
		<li><a href="index.php?odhlasit">Odhlásit</a></li>
		
		<h2>Seznam úkolů</h2>
		<ul>';
		foreach ($dotaz as $radek) {
			echo '<div class="task-list"><li><a href="index.php?seznam='.$radek['seznam_id'].'">'.htmlspecialchars($radek['seznam_jmeno']).'</a></li>';
		}
		echo '</ul>';
		formularPridatS();
		echo '</div>';
	}

}
function seznamUkolu() {
	if (isset($_GET['seznam']))
	{
		$seznam = $_GET['seznam'];
		$dotaz = dibi::select('*')
				->from('seznam')
				->where('seznam_id=%i', $seznam)
				->fetchAll();
		echo "<select name='seznam'>";
	foreach ($dotaz as $row) {
		echo "<option value='" . $row['seznam_id'] . "'>" . $row['seznam_jmeno'] . "</option>";
	}
	echo "</select>";
	}
	else {
	$dotaz = dibi::query('SELECT [seznam_jmeno], [seznam_id] FROM [seznam]');
	echo "<select name='seznam'>";
	foreach ($dotaz as $row) {
		echo "<option value='" . $row['seznam_id'] . "'>" . $row['seznam_jmeno'] . "</option>";
	}
	echo "</select>";
	}
}

?>