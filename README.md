Úkolníček
=========

Aplikace napsaná v PHP, která je určena pro domácí použití. Klade si za cíl přidávání a správu úkolů jednotlivým
členům v rodině, nebo v partě. 

Použité knihovny jsou:
* dibi - http://www.didibphp.com
* texy - http://texy.info/
* texyla - https://github.com/janmarek/Texyla
* jsDatePick - http://javascriptcalendar.org/

* V tuto chvíli je projekt ve fázi Alfa verze. Přestože je již na localhostu funkční. Projekt je primárně určen pro
potřeby učení jazyka PHP. Nicméně je v plánu projekt dotáhnout do funkčního konce.
* zdrojové kódy zde slouží pro ukázku a vyzkoušení. Uvítám jakékoliv návrhy na lepší řešení daných postupů.
* Postupně se doufám vše zoptimalizuje a stabilizuje

verze 0.2
---------
- Přepracovaná administrace. Přidán do složky /admin soubor index.php a vytvoření vzhledu administrace.
- V administraci je možné zvolit přidání nového uživatele
- V úvodu administrace se vypisují všichni uživatele
- Úprava uživatele zatím není funkční
- Přidáno ověření přihlašování dle oprávnění. Zatím je funkční oprávnění "admin" - "Administrátor", který má přístup
do administrační části aplikace.
- V plánu jsou tyto oprávnění
- 'Správce' - má oprávnění přidávat členům úkoly. Sám úkol od členů nemůže obdržet, pouze od správce.
- 'Člen' - má oprávnění si přidat nový úkol k dokončení, jiným členům ani správcům úkol přidat nemůže. Může od Správců 
úkol obdržet.

verze 0.1
----------

- Umí přidávat nové úkoly do kategorií (seznamy) a přiřadit je určitému uživateli.
- Umí přidat termín dokončení
- Umí označit úkol jako hotový
- Umí vypsat nedokončené úkoly dle přihlášeného uživatele
- Umí vypsat nedokončené úkoly dle přihlášeného uživatele a dle kategorie
- Umí, a to je důležité, odhlásit uživatele :-)

* Administrace je hodně jednoduchá a bude řešena v příštích dnech.
* Umí přidat nového uživatele
! Došlo ke změně přihlašování. V administraci jsem to ještě neošéfoval tuto změnu. Dojde během pár dnů.

CO JE PLÁNOVÁNO
===============

- [x] přidání rolí (administrátor, člen)
- [ ] registrace + schválení ze strany administrátora
- [x] Zaslání e-mailu v případě, že je přidán úkol - e-mail bude zaslán zvolenému zpracovateli
- [x] Zaslání e-mailu v případě, že je úkon přidán jako dokončený - e-mail bude zaslán tomu, co úkol zadal
- [ ] Vytvoření funkce pro výpočet počtu dnů do dokončení úkolu a s tím i zobrazování upozornění
- [ ] Vkládání poznámek do dokončeného úkolu - ze strany zpracovatele a ze strany zadavatele úkolu
- [ ] Hodnocení, jak byl úkol dokončen :-) - ze strany zadavatele úkolu
