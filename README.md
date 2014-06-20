Úkolníček 2
==========

Jedná se o druhou verzi webové aplikace úkolníček. V současné době ve vývojové verzi.

- Aplikace psaná ve frameworku CakePHP

Postup práce
==========

20.06.2014
----------
- Přidán datepicker pro výběr termínu dokončení pomocí jquery-ui
- Přidán pro vkládání a editaci ckeditor

18.06.2014
-----------
- Dopsána funkce pro ukončení úkolu. Pokud je úkol hotový, lze tímto uzavřít. 
- V indexu se zobrazují pouze nedokončené úkoly
- Ve formuláři pro přidání úkolu a jeho editaci se již končeně zobrauje jméno uživatele, kterému se má úkol přiřadit
- Vytvořen sidebar block a nastavení, aby se zobrazovalo menu pouze pro přihlášené uživatele.


Instalace
=========

- Nahrajte soubory do umístění
- ukolnicek.sql importujte do databaze ukolnicek (můžete i do jiné, je pak nutná úprava v /app/Config/database.php
- v /app/Config/database.php nastavte přihlašovací údaje do databáze
- Přihlášení základního uživatele je admin heslo admin
