# TAD szerkesztő

## Elvárt működés

1. A vázlatot a szerző elkészíti, megjelöli, hogy jóváhagyásra vár.
A TAD első vázlatának nem minden mezője szerkeszthető.

2. A jóváhagyó felületen megjelenik a vázlat



## Kérdőjelek

- Szerző Moodle felhasználó-e?

    - Változtatja: tad.author típus (string->id)
- módosítás dátuma szükséges?

    - Új tábla kell, amiben TAD-id alapján rögzítjük a szerkesztés időpontját

---

## Jogosultságok

Név| Jogosultság | Szerkesztő
---|---|---
tad:manager| Minden beállítás és mező elérése / szerkesztése | ✅
tad:approver| TAD-ok jóváhagyása |❌
tad:editor | Tad szerkesztése |✅
tad:reviewer | Tad ellenőrzése |❌

---

## Adatbázis táblák

Minden tábla a Moodle által meghatározott előtagot használja. Pl: mdl_táblanév

- tad:

    - TAD-ok id-ja, neve, szerzője, szerkeszthetősége, jóváhagyás állapota, jóváhagyás ideje

- tad_approved: 

    - Jóváhagyásra megjelölve?
    - Jóvá lett-e hagyva?
- tad_section:

    - TAD fő részei a TAD-idjával 
    - pl.: I. TANTÁRGYLEÍRÁS
- tad_section_fields:

    - TAD alrészei 
    - pl: 1 ALAPADATOK

- tad_section_fields_subfields:

    - TAD alrészek mezői 
    - pl.: 1.1 Tantárgy neve : Hungarian Language and Culture for SH Students 2.

- tad_files:

    - TAD-file elérése

---

## Adatbázis mezők
<br>

### tad

Név|Érték|Típus|
---|---|---
id|A TAD-ot azonosístó szám|int
name|TAD neve: "TAD_tárgykód"|string(15)
author|Szerző|string
editable|Lehet-e szerkeszteni?|BLOB(1)
timerelevant|TAD érvényessége|string
timecreated|létrehozás dátuma|epoch
version|Verziószám|int


<br>

### tad_approved

Név|Érték|Típus|
---|---|---
id|A TAD-ot azonosístó szám|int
tadid|TAD id-ja|int
flagged|Jóváhagyásra megjelölve?|BLOBL(1)
approved|Jóváhagyás állapota (igen, nem)|BLOB(1)


<br>

### tad_section
Név|Érték|Típus|
---|---|---
id|részlet azonosítója|int
tadid|Tartalmaző TAD id-ja|int
name|Fő rész neve|string
value|Fő rész értéke|string

<br>

### tad_section_fields

Név|Érték|Típus|
---|---|---
id|mező azonosítója|int
sectionid|Tartalmaző fő rész ID-ja|int
name|mező neve|string
value|mező értéke|string

<br>

### tad_section_fields_subfields

Név|Érték|Típus|
---|---|---
id|mező azonosítója|int
fieldid|Tartalmaző alrész ID-ja|int
name|mező neve|string
value|mező értéke|string

<br>

### tad_files

Név|Érték|Típus|
---|---|---
id|fájl azonosítója|int
tadid|TAD azonossítója|int
name|Fájl neve|string
path|fájl elérési útja|string

---

