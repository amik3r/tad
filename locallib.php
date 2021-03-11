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
 * @package   local_tad
 * @copyright 2021, Antal Miklós <antal.miklos@gtk.bme.hu>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use function PHPSTORM_META\type;

global $PAGE;
require_once(__DIR__ . '../../../config.php');
require_once(__DIR__ . '/classes/tad/tadfileobject.php');
require_once(__DIR__ . '/classes/tad/tadobject.php');
require_once(__DIR__ . '/classes/tad/entityobject.php');


function get_all_temp_tad_files(){
    global $DB;
    $filesql = "
        SELECT * FROM {files}
        WHERE filename 
            LIKE :filepattern 
        AND component LIKE :filearea
    ";
    $rows = $DB->get_records_sql($filesql, ['filepattern' => "TAD%.pdf", 'filearea' => 'local_tad']);
    return $rows;
}

function save_tad_files($semester = ''){
    if (!$semester){
        $semester = get_config('local_tad', "semester");
    }
    $actual_semester = str_replace("/",'', $semester);
    $fs = get_file_storage();
    $files = $fs->get_area_files(1, 'local_tad_temp', 'attachment');
    foreach ($files as $f) {
        $filename = $f->get_filename();
        if (strlen($filename) > 11){
            $filename_explode = explode('_', $filename);
            if (count($filename_explode) < 3){
                $extension = explode('.',$filename_explode[1]);
                $filename = $filename_explode[0] . "_" . $extension[0] . "_" . $actual_semester . '.' . $extension[1];
                //echo $filename . PHP_EOL;
            } else if (count($filename_explode) == 3){
                $filename_explode = explode('_', $filename);
                $extension = explode('.',$filename_explode[1]);
            }
            $f->delete();
        }
    }
}

function construct_view_table($lang, $semesterarg=null){
    global $DB;

    $entityobject = new Entity();

    $coursedatasql = "
        SELECT
            corr.name, 
            corr.code, 
            tad.name tadname, 
            tad.id, 
            tad.coursecode coursecode, 
            tad.dlurl, 
            tad.semester, 
            tad.author author, 
            tad.timecreated timecreated,
            tad.version version
        FROM {tad_corriculum} corr
        INNER JOIN {tad} tad ON corr.coursecode = tad.coursecode
        AND corr.coursecode = :coursecode
        AND tad.semester = :semester
        ORDER BY coursecode ASC
    ";

    $entitynamesql = "
        SELECT 
            cat.name, 
            c.category 
        FROM mdl_course_categories cat 
        INNER JOIN mdl_course c 
        ON c.shortname LIKE :coursecode% 
        AND cat.id = c.category
        LIMIT 1;
    ";

    $semesterlistsql = "
        SELECT DISTINCT semester
        FROM {tad}
    ";

    $semesterarray = [];

    $s = $DB->get_records_sql($semesterlistsql);
    foreach ($s as $k){
        $semesterstring = substr($k->semester, 0, 4) . '/' . substr($k->semester,4);
        $semesterstring = substr($semesterstring, 0, 7) . '/' . substr($semesterstring, 7);
        array_push($semesterarray, $semesterstring);
    }

    $tadarray = array();
    $templatecontent = array();
    $tadfiles = $DB->get_records('tad');
    $i = 0;

    foreach ($tadfiles as $tadfile) {
        // reparse semester str
        $i++;
        if ($semesterarg){
                $semester = str_replace('/','',$semesterarg);
                $coursedata = $DB->get_record_sql($coursedatasql, ['coursecode' => $tadfile->coursecode, 'semester' => $semester]);
            } else {
                $coursedata = $DB->get_record_sql($coursedatasql, ['coursecode' => $tadfile->coursecode, 'semester' => $tadfile->semester]);
            }
            if($coursedata){
                $entityname = $DB->get_record_sql($entitynamesql, ['coursecode' => $tadfile->coursecode]);
                if ($lang == 'hu'){
                    $entityname = $entityobject->get_hungarian($entityname);
                } else if ($lang == 'en'){
                    $entityname = $entityobject->get_english($entityname);
                }
                $semesterstring = substr($coursedata->semester, 0, 4) . '/' . substr($coursedata->semester,4);
                $semesterstring = substr($semesterstring, 0, 7) . '/' . substr($semesterstring, 7);
                $tad = new TadObject(
                    $coursedata->author,
                    $coursedata->coursecode,
                    $semesterstring,
                    $entityname,
                    $coursedata->tadname,
                    $coursedata->timecreated,
                    'irrelevant',
                    $coursedata->dlurl,
                    $i,
                    $coursedata->code,
                    $coursedata->name
                );
            } else {
                continue;
            }
            array_push($templatecontent, $tad->get_as_templatecontext());
    }
    $fulltemplatecontext = array(
        'id_heading'                => get_string('id_heading', "local_tad"),
        'course_code_heading'       => get_string('course_code_heading', "local_tad"),
        'course_name_heading'       => get_string('course_name_heading', "local_tad"),
        'entity_heading'            => get_string('entity_heading', "local_tad"),
        'time_created_heading'      => get_string('time_created_heading', "local_tad"),
        'file_heading'              => get_string('file_heading', "local_tad"),
        'label_noresult'            => get_string('label_noresult', "local_tad"),
        'semester_heading'          => get_string('semester_heading', "local_tad"),
        'corriculum_code_heading'   => get_string('corriculum_code_heading', "local_tad"),
        'corriculum_name_heading'   => get_string('corriculum_name_heading', "local_tad"),
        'filter_label'              => get_string('search_label', 'local_tad'),     
        'semester_label'            => get_string('semester_label', 'local_tad'),
        'semester_options'          => $semesterarray,
        'semester_select_default'   => get_string('semester_select_default', 'local_tad'),
        'rows'                      => $templatecontent,
        'count'                     => count($templatecontent)
    );
    return $fulltemplatecontext;
}

function ingest_tad_db($semester){
    global $DB;
    $coursedatasql = "
        SELECT name, code, coursename 
        FROM {tad_corriculum}
        WHERE coursecode = :coursecode
    ";
    $tadfiles = get_all_temp_tad_files();
    foreach ($tadfiles as $f) {
        $tadfile = new TadFileObject($f);
        $coursedata = $DB->get_record_sql($coursedatasql, ['coursecode' => $tadfile->coursecode]);
        if($coursedata){
            $tad = new TadObject(
                $tadfile->author,
                $tadfile->coursecode,
                $semester,
                $tadfile->entity,
                $coursedata->coursename,
                $tadfile->timecreated,
                $tadfile->filename,
                $tadfile->dllink,
                0,
                $coursedata->code,
                $coursedata->name
            );
                $tad->save_to_db();
        }
    }
}

function create_tad_corriculum_in_db($tad){
    global $DB;
    if(!$DB->insert_record('tad_corriculum', $tad)){
        return false;
    };
}

function parse_csv_file($separator){
    global $DB;
    // read csv file
    $checkmultiple = false;
    $fs = get_file_storage();
    // read corriculum table to filter duplicates (code, name)
    if($corrtable = $DB->get_records_sql('SELECT * FROM {tad_corriculum}')){
        $checkmultiple = true;
    };
    try {
        $files = $fs->get_area_files(1, 'local_tad', 'csv_temp');
        // last element of pesky arrays
        $file = end($files);
        $filecontent = $file->get_content();
        // split on newline
        $cont = explode(PHP_EOL, $filecontent);
        foreach ($cont as $line) {
            // split line on separator
            $linecont = explode($separator, utf8_encode($line));
            // check if line is empty
            if ($linecont[0] == ''|| $linecont[1] == ''){} 
            else {
                $corriculum_entry               = new stdClass();
                $corriculum_entry->code         = $linecont[0];
                $corriculum_entry->name         = $linecont[1];
                $corriculum_entry->coursecode   = $linecont[2];
                $corriculum_entry->coursename   = $linecont[3];
                $corriculum_entry->type         = 1;
                // check and skip if duplicate
                if($checkmultiple){
                    $isok = true;
                    foreach ($corrtable as $record) {
                        if(
                        $record->name       == $corriculum_entry->name && 
                        $record->code       == $corriculum_entry->code &&
                        $record->coursename == $corriculum_entry->coursename &&
                        $record->coursecode == $corriculum_entry->coursecode
                        ){
                            $isok = false;
                        }
                    }
                    if($isok){
                        create_tad_corriculum_in_db($corriculum_entry);
                    }
                } else{
                    create_tad_corriculum_in_db($corriculum_entry);
                }
            }
            // Delete csv file
            $file->delete();
        }
        if (count($files)>1){
            foreach ($files as $file) {
                $file->delete();
            }
        }
        return true;
    } catch (Throwable $th) {
        return false;
    }
}

