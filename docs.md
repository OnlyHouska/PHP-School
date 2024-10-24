## Dokumentace   
___

#### Typování v PHP
* Dynamicky psaný jazyk, s možností statického typování
* Typování je možné pro parametry funkcí, návratové hodnoty funkcí a pro vlastnosti tříd
* Příklad typování:
    * `function foo(int $a, string $b): bool { ... }`

#### Objektový model
* PHP podporuje objektově orientované programování
* Tj. třídy, objekty, dědičnost, interface,...
* Vytváření tříd je umožněno přes keyword `class`
* Příklad třídy:
    ```php
    class MyClass {
        public $property;
        public function __construct($property) {
            $this->property = $property;
        }
    }
    ```
* Vytvoření instance třídy:
  ```php
  $instance = new MyClass("value");
  ```
* Metoda `__construct()` patří k magickým metodám. To jsou metody, ktere se volají automaticky při splnění určitých podmínek. `__construct()` se volá při vytvoření instance třídy. Každá magická metoda začíná prefixem `__`, jsou predefinované a nemůžou být odstraňeny nebo manuálně vytvořeny
  * Příklady dalších magických metod
    * `__destruct()` - volá se při zničení instance třídy
    * `__get($name)` - volá se při pokusu o přístup k neexistující vlastnosti
    * `__set($name, $value)` - volá se při pokusu o nastavení neexistující vlastnosti
    * `__call($name, $arguments)` - volá se při pokusu o volání neexistující metody
    * `__toString()` - volá se při pokusu o výpis objektu jako string
  ``````
* `$this` je reference na aktuální objekt
* `public` je viditelnost vlastnosti nebo metody. Existují i další viditelnosti: `private` (vidí pouze aktuální objekt) a `protected` (vidí aktuální objekt a objekty, které z něho dědí)

#### Práce s poli - důležité funkce
* `array_push($array, $value)` - přidá prvek na konec pole
* `array_pop($array)` - odebere prvek z konce pole
* `array_shift($array)` - odebere prvek ze začátku pole
* `array_unshift($array, $value)` - přidá prvek na začátek pole
* `array_merge($array1, $array2)` - spojí dvě pole
* `array_slice($array, $offset, $length)` - vrátí část pole
* `array_splice($array, $offset, $length, $replacement)` - nahradí část pole jiným polem
* 

---

### Popis projektu (asi)
Snažil jsem se přijít na nějaký jednoduchý přístup ale úplně mi to nevyšlo a řekl bych, že to mám zbytečně složitý ale co už no.
Naprosto upřímně, sám moc nevím jak to celý funguje. Právě ve vývoji webovek v PHP jsem momentálně na DPP smlouvu u jedný firmy takže už mám dost zkušeností a vlastně jsem to psal už automaticky všechno a moc nad tím nepřemýšlel.
Pokud bych to měl ale nějak popsat tak jsem se to snažil rozdělit do co nejvíc tříd to jen jde pro nějakou tu lepší accesibilitu a přehlednost. V každý jsou vlastně jen nějaký gettery a settery + properties a někde i basic metody co s tím souvisí. To jak funguje vytváření toho timetablu se mi ale moc nelíbí. Je to moc velký a zdlouhavý ale nenapadlo mě lepší řešení. Maximálně načítání z JSON ale to by bylo asi ještě horší (a nechtělo se mi dělat). Po boji s CSS poslušně hlásím že jsem se vzdal a pokus o přidání více skupin do jedné hodiny jsem abortnul. Kód samotný to umožňuje, jen se to správně nerendruje (ale je to tam technicky).

