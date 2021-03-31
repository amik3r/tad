<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
 
/**
 *  * Strings for component 'tad', language 'hu'

 * @package   local_tad
 * @copyright 2021, Antal Miklós <antal.miklos@gtk.bme.hu>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'TAD portál';


// Settings page labels
$string['settings_pluginname'] = 'TAD';
$string['settings_semester_label'] = 'Félév';

$string['manager'] = 'TAD-ok teljeskörű kezelése';
$string['approver'] = 'TAD-ok jóváhagyása';
$string['editor'] = 'TAD-ok szerkesztése';
$string['reviewer'] = 'TAD-ok ...';

// Page titles
$string['upload_corriculumlabel'] = 'Tanterv adatok feltöltése';

// Form strings 
$string['uploadlabel'] = 'TAD-ok feltöltése';
$string['csv_upload_label'] = 'Tantervek feltöltése';
$string['csv_separator_label'] = 'Elválasztó';
$string['csv_parse_error'] = 'CSV fájl beolvasása sikertelen';

// Notifications
$string['upload_cancelled'] = 'Feltöltés megszakítva';
$string['upload_successful'] = 'Feltöltés sikeres';
$string['upload_failed'] = 'Feltöltési hiba';

// view labels
$string['semester_label'] = 'Félév';
$string['search_label'] = 'Keresés';
$string['semester_select_default'] = 'Összes';


// Table headings in view.php
$string['time_created_heading'] = 'Létrehozva';
$string['id_heading'] = 'ID';
// aktuális
$string['corriculum_code_heading'] = 'Tanterv kód';
$string['corriculum_name_heading'] = 'Szak';
$string['author_heading'] = 'Szerző';
$string['course_code_heading'] = 'Tárgykód';
$string['semester_heading'] = 'Félév';
$string['department_heading'] = 'Tanszék';
$string['course_name_heading'] = 'Tárgynév';
$string['file_heading'] = 'Letöltés';

// Misc HTML content
$string['label_noresult'] = 'Nincs találat!';
$string['semester_select_label'] = 'Félév';
$string['filterlabel'] = 'Szűrés';
$string['empty_corr_label'] = 'Átoktatás';
$string['corr_default_label'] = 'Szakok, melyben a tárgy szerepel';
$string['tad_announcement'] = 'A TAD Portál kisérleti verziója, amely egyelőre a 2020/2021 tavaszi félév tantárgyi adatlapjait tartalmazza.';



// TAD EDITOR
// Section 1
$string['1_1'] = 'Tantárgy neve';
$string['1_2'] = 'Azonosító';
$string['1_3'] = 'A tantárgy jellege';
$string['1_4'] = 'Kurzustípusok és óraszámok';
$string['1_4_1'] = 'Előadás';
$string['1_4_2'] = 'Gyakorlat';
$string['1_4_3'] = 'Laboratórium';
$string['1_5'] = 'Tanulmányi teljesítményértékelés (minőségértékelés) típusa';
$string['1_6'] = 'Kreditszám';
$string['1_7'] = 'Tantárgyfelelős';
$string['1_8'] = 'Tantárgyat gondozó oktatási szervezeti egység';
$string['1_9'] = 'A tantárgy weblapja';
$string['1_10'] = 'A tantárgy oktatásának nyelve';
$string['1_11'] = 'A tantárgy tantervi szerepe, ajánlott féléve';
$string['1_12'] = 'Közvetlen előkövetelmények';
$string['1_12_1'] = 'Erős';
$string['1_12_2'] = 'Gyenge';
$string['1_12_3'] = 'Párhuzamos';
$string['1_12_4'] = 'Kizáró feltételek';
$string['1_13'] = 'A tantárgyleírás érvényessége';

$string['section1_approve_label'] = 'Szekció jóváhagyása';
$string['tadform_missing_field_label'] = 'Kötelező megadni';
