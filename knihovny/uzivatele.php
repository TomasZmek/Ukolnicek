<?php
include_once ('nastaveni.php');
// kontrola zadávaného mailu
function kontrola_mailu() {
	$email = $_POST['email'];
	return !(!preg_match('/[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})/i', $email));
}

//vypsani uzivatelu
function vypsatUzivatele()
{
	$dotaz = dibi::select("uzivatel_id, uzivatel_jmeno, uzivatel_email")
				->from("uzivatele")
				->fetchAll();
	$pocetU = count($dotaz);
	if ($pocetU == 0)
	{
		echo "<strong>V tuto chvíli není žádný uživatel</strong>";
	}
	else
		{
			echo '<div id="content"><h2>Seznam uživatelů</h2><table id="uzivatele">
				<tr><th><strong>Jméno</strong></th><th><strong>E-mail</strong></th><th><strong>Akce</strong></th></tr>';
		foreach ($dotaz as $radek) {
			echo '<tr><th>' . htmlspecialchars($radek["uzivatel_jmeno"]) 
			.'</th><th>'. htmlspecialchars($radek["uzivatel_email"]) . '</th><th><a href="uzivatel.php?upravit=' . $radek["uzivatel_id"] . '">Upravit</a> <a href="uzivatel.php?smazat=' . $radek["uzivatel_id"] . '">Smazat</a></th></tr>';
			
		}
		echo '</table></div>';
		}
}
//overeni jestli e-mail uz neni u jineho uzivatele
function obsazenyEmail($email) {
	$dotaz = dibi::query('SELECT COUNT(*) FROM [uzivatele] WHERE [uzivatel_email]=%s', $email);
	return $dotaz -> fetchSingle();
}

//samotna funkce pridani uzivatele do databaze
function pridatUzivatele($jmeno, $heslo, $email) {
	$hodnoty = array('uzivatel_jmeno' => $jmeno, 'uzivatel_heslo' => otiskHesla($heslo), 'uzivatel_email' => $email);
	$dotaz = dibi::query('INSERT INTO [uzivatele]', $hodnoty);
}

//overovaci funkce pro pridani uzivatele do databaze
function pridej() {
	if (isset($_POST['pridatu'])) {
		$jmeno = $_POST['jmeno'];
		$heslo = $_POST['heslo'];
		$heslo2 = $_POST['heslo2'];
		$email = $_POST['email'];

		if (kontrola_mailu($email) == FALSE) {
			echo "<p><strong>Chybně zadaný e-mail</strong></p>";
		} 
		elseif (obsazenyEmail($email) == TRUE) {
		echo "<p><strong> E-mail je už přiřazený k jinému uživateli</strong></p>";
		} elseif ($heslo != $heslo2) {
			echo "<p><strong> Zadaná hesla se neschodují!</strong></p>";
		}  else {
			pridatUzivatele($jmeno, $heslo, $email);
			echo "Uživatel $jmeno byl přidán.";
		}
	}

}
// Smazání uživatele z databáze
function smazUzivatele()
{
if (isset($_GET['smazat']))
{
	dibi::query('DELETE FROM [uzivatele] WHERE [uzivatel_id]=%i', $_GET['smazat']);
}
}
function jmenoUzivatele()
{
	$id = $_SESSION['prihlaseny_id'];
	$dotaz = dibi::query('SELECT [uzivatel_id], [uzivatel_jmeno] FROM [uzivatele] WHERE [uzivatel_id]=%i', $id);
	foreach ($dotaz as $radek){
	echo $radek['uzivatel_jmeno'];
	}
	unset($radek);
}
function zobrazUzivatele() {
	$dotaz = dibi::query('SELECT [uzivatel_jmeno], [uzivatel_id] FROM [uzivatele]');
	echo "<select name='uzivatel'>";
	foreach ($dotaz as $row) {
		echo "<option value='" . $row['uzivatel_id'] . "'>" . $row['uzivatel_jmeno'] . "</option>";
	}
	echo "</select>";
}
function uzivateleForm()
{
?>		<div id="content"><h2>Přidat uživatele</h2>
		<form name="pridatu" method="POST">
					<fieldset>
						<label for="jmeno">Jméno:</label>
						<input name="jmeno" id="jmeno" type="text" value="" />
						<br />
						<label for="email">E-mail:</label>
						<input name="email" id="email" type="email" value="" />
						<br />
						<label for="heslo">Zadejte heslo:</label>
						<input name="heslo" id="heslo" type="password" />
						<br />
						<label for="heslo2">Zopakujte heslo:</label>
						<input name="heslo2" id="heslo2" type="password" />
						<br />
						<input name="pridatu" type="submit" value="Přidat uživatele" />
					</fieldset>
				</form>
			</div>
<?php
pridej();
}
?>