
![Logo](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg)


# Elolvasott könyveket számon tartó rendszer Laravelben

Egy olyan oldal, ahol a felhasználók rendszerezhetik az elolvasott könyveiket, valamint véleményeket írhatnak róluk és ezt megoszthatják másokkal.


---
## Telepítés

Klónozza a projektet:

```
git clone https://github.com/endermason/OlvasottKonyvek.git
```

Menjen a projekt mappájába:

```
cd projekt
```

Telepítse a függőségeket:

```
composer install
```

Hozzon létre egy `.env` fájlt és állítsa be az `adatbázis` és az `email szerver` beállításait:

```
cp .env.example .env
```

Generálja le a kulcsot:

```
php artisan key:generate
```

Migrálja az adatbázist:

```
php artisan migrate
```

Futtassa a fejlesztői szervert:

```
php artisan serve
```

---
## Használat

A weboldal alapértelmezett kezdőoldala a `Welcome` aloldal.
Itt egy rövid leírás található az oldalról.

Az weboldal használatához a felhasználónak regisztrálnia kell a `Regisztráció` aloldalon.

A regisztráció a felhasználó által megadott email címre küldött `megerősítő linkre`
való kattintás után lesz teljes. Amennyiben nem érkezett meg a megerősítő link,
a felhasználónak lehetősége van új megerősítő linket kérni.

A felhasználó a `Belépés` aloldalon tud bejelentkezni a felhasználónevével és jelszavával.
Amennyiben elfelejtette a jelszavát, lehetősége van jelszó-helyreállítást kérni,
amit a felhasználó által megadott email címre küldött linkre kattintva tud megtenni.

Bejelentkezés után a felhasználó a `Dashboard` oldalon találja magát,
ahol egy rövid segítség található az oldal használatához.

A `Könyvek` menüpont alatt tudja kezelni az elolvasott könyveit.
Az oldal listázza a felhasználó olvasott könyveit és az azokról készült véleményeit, melyeket
a `Törlés` és a `Vélemény szerkesztése` gombokkal tud szerkeszteni vagy módosítani.
A `Törlés` gomb a könyvet és a róla írt véleményt is törli. 

Az `Új könyv hozzáadása` aloldalon tud új könyvet hozzáadni.
Ebben az esetben először a könyv címét kell megadnia, és amennyiben nem található ilyen könyv
az oldal adatbázisában, akkor a könyv adatait manuálisan kell megadni.
A könyv címének megadása után a könyv adatai automatikusan kitöltődnek,
amennyiben az oldal adatbázisában megtalálható a könyv.
Az elolvasás idejének megadása után a könyv hozzáadódik a felhasználó könyveihez.
A könyv hozzáadása után a felhasználó visszakerül a `Könyvek` oldalra,
ahol a hozzáadott könyv megjelenik a listában.

Ezután a `Vélemény írása` gombra kattintva tud véleményt írni a könyvről.
A vélemény írása után a felhasználó visszakerül a `Könyvek` oldalra,
ahol a listában látszódik, hogy arról a könyvről van már véleménye.
Egy könyvet többször is el lehet olvasni, és minden elolvasáshoz lehet véleményt írni.
A vélemény írásánál a ***könyv címét*** és az ***elolvasás idejét*** 
automatikusan kitölti a rendszer, a felhasználónak csak az ***értékelést***,
a ***véleményt***, valamint azt, hogy a véleménye ***publikus***-e, vagy sem, kell megadnia.
A véleménynek ***cím***et adni nem kötelező.

A `Vélemények` aloldalon a felhasználók ***publikus véleményei*** jelennek meg.
A véleményekre a ***könyv címe*** alapján keresni, a ***kövyv írója*** és a róla írt
***értékelés*** alapján szűrni lehet. Ezen felül a véleményeket lehetőség van sorba rendezni a 
***könyv címe***, ***értékelés***, ***vélemény készítésének ideje*** szerint is. 

A `Kapcsolat` aloldalon a felhasználók üzenetet küldhetnek az oldal üzemeltetőjének.
Az üzenet küldéséhez a felhasználónak meg kell adnia a ***nevét***, ***email cím***ét,
az üzenet ***tárgy***át és magát az ***üzenet***et. Az üzenet elküldése után
a felhasználó visszajelzést kap az üzenet elküldéséről.
A beállított email-szerver alapján az üzenetet az oldal üzemeltetője megkapja,
valamint válaszoli tud az üzenetre. 

Az `Admin` aloldal csak az adminisztrátorok számára érhető el.
Itt egy rövid leírás található az admin jogosultságokról, valamint egy link, amely a vélemények oldalra irányítja az adminisztrátort.

A `Kilépés` gombra kattintva a felhasználó kijelentkezik az oldalról. A kijelentkezés után a felhasználó a `Welcome` aloldalra kerül.

---
## Controllerek és főbb függvények
A projektben összesen `7 db` kontroller és ezeken belül `26 db` függvény került kialakításra:
A __Controllers__ mappában lévő `Controller.php`-t és az __Auth__ mappában található kontrollereket a Laravel beépítetten tartalmazza.

### Admincontroller
#### `construct()`
- Bejelentkezés ellenőrzése: a konstruktorban a middleware-eket hívjuk be, hogy csak bejelentkezett és megerősített felhasználók férhessenek hozzá az oldalhoz
#### `invoke()`
- A függvényben  ellenőrizzük, hogy az adott felhasználó admin-e, ha nem, akkor a `dashboard`-ra irányítjuk át.
### BrowsingController
#### `construct()`
- Bejelentkezés ellenőrzése: a konstruktorban a middleware-eket hívjuk be, hogy csak bejelentkezett és megerősített felhasználók férhessenek hozzá az oldalhoz
#### `index()`
- A függvényben a keresési feltételeket állítjuk be, majd a lekérdezés eredményét átadjuk a sessionbe. Ezután a sessionben tárolt adatokat átadjuk a `view`-nak.
#### `load()`
- A sessionben tárolt adatok következő oldalát adja át a `view`-nak.
#### `delete()`
- Amennyiben a felhasználó admin jogosultsággal rendelkezik, törölheti a véleményt.
### ContactController
#### `invoke()`
- Kapcsolat oldal megjelenítése
#### `send()`
- Kapcsolat oldalról küldött üzenet feldolgozása.
### DashboardController
#### `construct()`
- Bejelentkezés ellenőrzése: a konstruktorban a middleware-eket hívjuk be, hogy csak bejelentkezett és megerősített felhasználók férhessenek hozzá az oldalhoz
#### `invoke()`
- A `dashboard` oldal megjelenítése
### ReadsController
#### `construct()`
- Bejelentkezés ellenőrzése: a konstruktorban a middleware-eket hívjuk be, hogy csak bejelentkezett felhasználók férhessenek hozzá az oldalhoz
#### `index()`
- Listázza az olvasott könyveket.
#### `createStart()`
- Kezdeti view egy új olvasási bejegyzés létrehozásánál.
#### `createSearch()`
- Keresés cím alapján egy új olvasási bejegyzés létrehozásánál.
#### `createNew()`
- Egy teljesen új olvasási bejegyzés létrehozása.
#### `create()`
- Egy új olvasási bejegyzés létrehozása (a könyv már létezik).
#### `storeNew()`
- Egy teljesen új olvasási bejegyzés mentése.
#### `store()`
- Egy új olvasási bejegyzés mentése.
#### `delete()`
- Egy olvasási bejegyzés törlése.
### ReviewController
#### `construct()`
- Bejelentkezés ellenőrzése: a konstruktorban a middleware-eket hívjuk be, hogy csak bejelentkezett és megerősített felhasználók férhessenek hozzá az oldalhoz
#### `createReview()`
- Egy könyvhöz tartozó vélemény létrehozása
#### `store()`
- Egy könyvhöz tartozó vélemény mentése az adatbázisba
#### `editReview()`
- Egy könyvhöz tartozó vélemény szerkesztésének elkezdése
#### `edit()`
- Egy könyvhöz tartozó vélemény szerkesztésének mentése
#### `delete()`
- Egy könyvhöz tartozó vélemény törlése
### WelcomeController
#### `invoke()`
- Ha a felhasználó be van jelentkezve, akkor a `dashboard` oldalra irányítjuk át, ha nem, akkor a `welcome` oldalra.
---
## Modell osztályok
A weboldal `5` modellt használ:
- `User`: a felhasználók adatait tárolja
- `Author`: a szerzők adatait tárolja
- `Book`: a könyvek adatait tárolja
- `Read`: az olvasott könyvek adatait tárolja
- `Review`: a könyvekhez tartozó véleményeket tárolja
---
## Adatbázis
A projekt jelenleg sqlite adatbázist használ, amely a `database/database.sqlite` fájlban található.
Az oldal `10` táblát használ, ezekből a `users`, `password_resets`, `failed_jobs`, `personal_access_tokens` és `migrations`, valamint a `sqlite_sequence` táblák a Laravel beépített táblái.
A többi tábla a `php artisan migrate` parancs kiadásával jön létre. A táblák a következők:
- `users`: a felhasználók adatait, valamint a bejelentkezéshez szükséges adatokat és jogosultságokat tárolja
- `authors`: a szerzők adatait tárolja
- `books`: a könyvek adatait tárolja
- `reads`: az olvasott könyvek adatait tárolja
- `reviews`: a könyvekhez tartozó véleményeket tárolja
- `password_resets`: a jelszó visszaállításához szükséges adatokat tárolja
- `migration`: a migrációkhoz szükséges adatokat tárolja
- `sqlite_sequence`: az adatbázisban lévő táblákhoz tartozó `id`-k értékét tárolja
- `failed_jobs`: a hibásan lefutott `job`-okat tárolja
- `personal_access_tokens`: a `sanctum` tokeneket tárolja
---
## Jogosultságok
Az oldal `2` jogosultsági szintet használ:
- `admin`: a **user** tábla **admin** oszlopában `1`-es értékkel rendelkező felhasználók rendelkeznek ezzel a jogosultsággal.
Jogosultak bármely felhasználó nyilvános véleményének törlésére.
- `user`: a **user** tábla **admin** oszlopában `0`-ás értékkel rendelkező felhasználók rendelkeznek ezzel a jogosultsággal.
Alapértelmezetten minden felhasználó ezzel a jogosultsággal rendelkezik.
