### PDO
* PHP Document Object
* PHP extension pro přístup k databázi
* Data-access abstraction layer 
  * Nehledě na to jakou databázi používáme, můžeme použít stejné funkce
* Příklad funkcí
  * `PDO::prepare()` - připraví dotaz k provedení
    * Jdou použít zástupné znaky pro parametry kteé budou přidány následně v kódu
  * `PDO::execute()` - provede připravený dotaz
  * `PDO::query()` - provede dotaz a vrátí výsledek
* Pomocí `PDO::prepare()` a `PDO::execute()` můžeme zabránit SQL Injection
### PDOStatement
* Již připravený dotaz
* Príklad funcí
  * `PDOStatement::fetch()` - vrátí řádek z výsledku
  * `PDOStatement::fetchAll()` - vrátí všechny řádky z výsledku

### Hashování hesla
* Hashuju pomocí defaultního algoritmu PHP
  * `$hashed_password = password_hash($password, PASSWORD_DEFAULT);`
* Porovnávání hesla provádím pomocí PHP funkce `password_verify()`
  * `password_verify($password, $user['password']);`
  * Provádí se automaticky podle správného agoritmu na základě předaného hashe (salt)

