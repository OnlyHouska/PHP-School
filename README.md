### Předávání hodnot v HTTP requestech

* **GET:** Parametry v URL ($_GET), hodí se pro vyhledávání, filtrování, stránkování.
* **POST:** Data odeslána v těle požadavku ($_POST), vhodné pro formuláře, přihlašování.

### Superglobální pole v PHP

    $_GET – data z URL parametrů
    $_POST – data z formulářů
    $_REQUEST – kombinace $_GET, $_POST a $_COOKIE
    $_COOKIE – data uložená v cookies
    $_SESSION – data ze session
    $_SERVER – info o serveru a requestu
    $_FILES – data o nahraných souborech
    $_ENV – proměnné prostředí

### Regulární výrazy (regex) v PHP

* **Funkce:** preg_match(), preg_match_all(), preg_replace(), preg_split()

**Příklad:**
```php
preg_match('/\d+/', 'Cena je 100 Kč'); // najde "100"
$vymena = preg_replace('/\d{2}\.\d{2}\.\d{4}/', '[datum]', 'Dnes je 04.12.2024'); //nahradí [datum] za string
```

**Metaznaky:**
* ^ (začátek)
* $ (konec)
* \d (číslo)
* \w (písmeno, číslo, podtržítko)
* . (jakýkoli znak)
* \s (bílý znak)

**_a spousta dalších_**

## Popis a zdůvodnění řešení
Zvolil jsem řešení bez stylování, protož už takhle to nestíhám.
Co se týče ukládání dat, používám cookies, protože je to podle mě jednodušší než přes sessions.
Rozhodně by to mohlo být lepší ale zapomněl jsem na to a není čas. 
