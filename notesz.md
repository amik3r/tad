# Meeting 2021.02.25

## Feladatok:

Április 3: TAD portál ellenőrzése

Március 20: TAD portál készen kell legyen!!

---

## III. RÉSZLETES TANTÁRGYTEMATIKA

Csak ez szerkeszthető!!

Érvényesség: félévente változik

tól-ig


## Feladat részei:

### TAD-portál kialakítása

### példa:
C:\temp\tadok_eredeti\menedzsment\tavasz\TAD-hu-BMEGT20A018-Termelesmenedzsment-Koltai-Tamas

### Kritériumok:

- fájlnév:
    
    formátum: "{tárgykód}\_{szak neve}\_{mintatanterv kód}.[docx, doc]
    - "_"-al elválasztva
    - Tárgykód:

        - 11 karakter
        - BMEGT\d{2}\w{1}\d{3}

- tartalom:

    - Formailag megfelelőnek kell lennie
    - 


### Kell
---

    - Tárgykódból kideríthető:
        - Tanszék
        - Szak


# Kontaktok

    - Zarka Dénes --- MTI igazgató
        -  PDF-ek stamplizása letöltéskor

# 2021.03.02 Emő meeting

    -   Félév jelölése a fájlokban
    -   3. szekció szerkesztése
    -   mintatanterv - tárgykód


# Tanszékek

## Összes

| id | name                                               | parent |
|---|---|---|
|  1 | 2020/2021 II. félév                                |      0 |
|  2 | 2020/2021 semester II                              |      0 |
|  3 | Nem induló tárgyak                                 |      0 |
|  4 | Inactive courses                                   |      0 |
|  5 | Ergonómia és Pszichológia Tanszék                  |      1 |
|  6 | Filozófia és Tudománytörténet Tanszék              |      1 |
|  7 | Idegen Nyelvi Központ                              |      1 |
|  8 | Környezetgazdaságtan Tanszék                       |      1 |
|  9 | Közgazdaságtan Tanszék                             |      1 |
| 10 | Menedzsment és Vállalkozásgazdaságtan Tanszék      |      1 |
| 11 | Mérnöktovábbképző Intézet                          |      1 |
| 12 | Műszaki Pedagógia Tanszék                          |      1 |
| 13 | Pénzügyek Tanszék                                  |      1 |
| 14 | Szociológia és Kommunikáció Tanszék                |      1 |
| 15 | Testnevelési Központ                               |      1 |
| 16 | Üzleti Jog Tanszék                                 |      1 |
| 17 | Ergonómia és Pszichológia Tanszék                  |      3 |
| 18 | Filozófia és Tudománytörténet Tanszék              |      3 |
| 19 | Idegen Nyelvi Központ                              |      3 |
| 20 | Környezetgazdaságtan Tanszék                       |      3 |
| 21 | Közgazdaságtan Tanszék                             |      3 |
| 22 | Menedzsment és Vállalkozásgazdaságtan Tanszék      |      3 |
| 23 | Mérnöktovábbképző Intézet                          |      3 |
| 24 | Műszaki Pedagógia Tanszék                          |      3 |
| 25 | Pénzügyek Tanszék                                  |      3 |
| 26 | Szociológia és Kommunikáció Tanszék                |      3 |
| 27 | Testnevelési Központ                               |      3 |
| 28 | Üzleti Jog Tanszék                                 |      3 |
| 29 | Department of Ergonomics and Psychology            |      2 |
| 30 | Department of Philosophy and History of Science    |      2 |
| 31 | Centre of Modern Languages                         |      2 |
| 32 | Department of Environmental Economics              |      2 |
| 33 | Department of Economics                            |      2 |
| 34 | Department of Management and Business Economics    |      2 |
| 35 | Institute of Continuing Engineering Education      |      2 |
| 36 | Department of Technical Education                  |      2 |
| 37 | Department of Finance                              |      2 |
| 38 | Department of Sociology and Communication          |      2 |
| 39 | Centre of Physical Education                       |      2 |
| 40 | Department of Business Law                         |      2 |
| 41 | Department of Ergonomics and Psychology            |      4 |
| 42 | Department of Philosophy and History of Science    |      4 |
| 43 | Centre of Modern Languages                         |      4 |
| 44 | Department of Environmental Economics              |      4 |
| 45 | Department of Economics                            |      4 |
| 46 | Department of Management and Business Economics    |      4 |
| 47 | Institute of Continuing Engineering Education      |      4 |
| 48 | Department of Technical Education                  |      4 |
| 49 | Department of Finance                              |      4 |
| 50 | Department of Sociology and Communication          |      4 |
| 51 | Centre of Physical Education                       |      4 |
| 52 | Department of Business Law                         |      4 |
| 53 | Szakonkénti TAD-portál                             |      0 |
| 56 | Dékáni Hivatal                                     |      1 |
| 57 | X. Moodle üzemeltetés                              |      3 |
| 60 | Dean's Office                                      |      2 |
| 61 | ZV Tananyagok                                      |      3 |


## Angol

``` SQL
SELECT name FROM mdl_course_categories WHERE parent = 2 OR parent = 4;
```

## Magyar

``` SQL
SELECT name FROM mdl_course_categories WHERE parent = 1 OR parent = 3;
```

| angol                                           |magyar                                             |
|-------------------------------------------------|---------------------------------------------------|
| Department of Ergonomics and Psychology         |Ergonómia és Pszichológia Tanszék                  |
| Department of Philosophy and History of Science |Filozófia és Tudománytörténet Tanszék              |
| Centre of Modern Languages                      |Idegen Nyelvi Központ                              |
| Department of Environmental Economics           |Környezetgazdaságtan Tanszék                       |
| Department of Economics                         |Közgazdaságtan Tanszék                             |
| Department of Management and Business Economics |Menedzsment és Vállalkozásgazdaságtan Tanszék      |
| Institute of Continuing Engineering Education   |Mérnöktovábbképző Intézet                          |
| Department of Technical Education               |Műszaki Pedagógia Tanszék                          |
| Department of Finance                           |Pénzügyek Tanszék                                  |
| Department of Sociology and Communication       |Szociológia és Kommunikáció Tanszék                |
| Centre of Physical Education                    |Testnevelési Központ                               |
| Department of Business Law                      |Üzleti Jog Tanszék                                 |
| Department of Ergonomics and Psychology         |Ergonómia és Pszichológia Tanszék                  |
| Department of Philosophy and History of Science |Filozófia és Tudománytörténet Tanszék              |
| Centre of Modern Languages                      |Idegen Nyelvi Központ                              |
| Department of Environmental Economics           |Környezetgazdaságtan Tanszék                       |
| Department of Economics                         |Közgazdaságtan Tanszék                             |
| Department of Management and Business Economics |Menedzsment és Vállalkozásgazdaságtan Tanszék      |
| Institute of Continuing Engineering Education   |Mérnöktovábbképző Intézet                          |
| Department of Technical Education               |Műszaki Pedagógia Tanszék                          |
| Department of Finance                           |Pénzügyek Tanszék                                  |
| Department of Sociology and Communication       |Szociológia és Kommunikáció Tanszék                |
| Centre of Physical Education                    |Testnevelési Központ                               |
| Department of Business Law                      |Üzleti Jog Tanszék                                 |
| Dean's Office                                   |Dékáni Hivatal                                     |
