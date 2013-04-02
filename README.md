Ukolnicek
=========

Ukolnicek v php pro domaci uziti - Pridavani a sprava ukolu jednotlivym clenum v rodine .

Použité knihovny jsou:
* dibi - http://www.didibphp.com
* texy - http://texy.info/
* texyla - https://github.com/janmarek/Texyla
* jsDatePick - http://javascriptcalendar.org/

* V tuto chvíli je projekt ve fázi Alfa verze. Přestože je již na localhostu funkční. Projekt je primárně určen pro
potřebí učení jazyka PHP. Nicméně je v plánu projekt dotáhnout do funkčního konce.
* zdrojové kódy zde slouží pro ukázku a vyzkoušení. Uvítám jakékoliv návrhy na lepší řešení daných postupů.
* Postupně se doufám vše zoptimalizuje a stabilizuje

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

- přidání rolí (administrátor, člen)
- registrace + schválení ze strany administrátora
- Zaslání e-mailu v případě, že je přidán úkol - e-mail bude zaslán zvolenému zpracovateli
- Zaslání e-mailu v případě, že je úkon přidán jako dokončený - e-mail bude zaslán tomu, co úkol zadal
- Vytvoření funkce pro výpočet počtu dnů do dokončení úkolu a s tím i zobrazování upozornění
- Vkládání poznámek do dokončeného úkolu - ze strany zpracovatele a ze strany zadavatele úkolu
- Hodnocení, jak byl úkol dokončen :-) - ze strany zadavatele úkolu
