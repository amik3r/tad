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

global $PAGE;
require_once(__DIR__ . '../../../config.php');
require_once(__DIR__ . '/classes/tad/tadfileobject.php');
require_once(__DIR__ . '/classes/tad/tadobject.php');
require_once(__DIR__ . '/classes/tad/departmentobject.php');
require_once(__DIR__ . '/classes/tad/section1.php');
require_once(__DIR__ . '/classes/db/db_tadobject.php');

function get_tad_files(){
    global $DB;
    $filesql = "
        SELECT * FROM {files}
        WHERE filename 
        LIKE :filepattern
        AND component LIKE :component
        AND filearea = 'attachment'
    ";
    $rows = $DB->get_records_sql($filesql, ['filepattern' => "TAD%.pdf", 'component' => 'local_tad']);
    return $rows;
}

/* function save_tad_files($semester = ''){
    die;
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
} */

function delete_temp_tad(){
    $fs = get_file_storage();
    if(!$files = $fs->get_area_files(1,'local_tad','temp')){
        return;
    };
    foreach ($files as $f) {
        $filename = $f->get_filename();
        if (substr_compare($filename, 'TAD_', 0, 4) == 0 ||substr_compare($filename, '.',0)){
            $f->delete();
            echo "\ndeleted: " . $filename . "\n\r";
        }
    }
}
// Construct helpers

// Get semester data of TAD
function get_course_data($coursedatasql, $tadfile, $semesterarg=null){
    global $DB;
    // get semester specific data
    if ($semesterarg){
        $coursedata = $DB->get_records_sql($coursedatasql, ['coursecode' => $tadfile->coursecode, 'semester' => $semesterarg]);
        $coursedata = reset($coursedata);
    } else {
        // get all
        $coursedata = $DB->get_records_sql($coursedatasql, ['coursecode' => $tadfile->coursecode, 'semester' => $tadfile->semester]);
        $coursedata = reset($coursedata);
    }
    return $coursedata;
}

// Get department name
function get_department_names($lang, $tadfile){
    $depobj = new Department();
    if ($lang != 'hu'){
        $departmentname = $depobj->get_english($depobj->get_department_by_code(substr($tadfile->coursecode, 3, 4)));
        return $departmentname;
    }
    $departmentname = $depobj->get_hungarian($depobj->get_department_by_code(substr($tadfile->coursecode, 3, 4)));
    return $departmentname;
}

// Collect all semesters in DB
function get_semester_array($semesterlistsql){
    global $DB;
    $semesterarray = [];
    if ($s = $DB->get_records_sql($semesterlistsql)){
        foreach ($s as $k){
            $semesterstring = substr($k->semester, 0, 4) . '/' . substr($k->semester,4);
            $semesterstring = substr($semesterstring, 0, 7) . '/' . substr($semesterstring, 7);
            array_push($semesterarray, $semesterstring);
        }
    } else {
        $semesterarray = ['2020/21/2'];
    };
    return $semesterarray;
}

// List semesters as nav links
function get_semester_urls($semesterarray){
    $semesterurls = array();
    foreach ($semesterarray as $s) {
        $sdata = new stdClass();
        $sdata->displaystr = $s;
        $sdata->url = new moodle_url('/local/tad/view.php', array('semester' => str_replace('/','',$s)));
        $sdata->url = $sdata->url->out();
        array_push($semesterurls, $sdata);
    };
    return $semesterurls;
}

// Construct the whole view
function construct_view_table($lang, $semesterarg=null){
    global $DB;
    global $PAGE;
	if(!$lang){
		$lang='en';
	}

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
    $semesterlistsql = "
        SELECT DISTINCT semester
        FROM {tad}
    ";

    $semesterarray = get_semester_array($semesterlistsql);
    $semesterurls = get_semester_urls($semesterarray);
    $templatecontent = array();
    $tadfiles = $DB->get_records('tad');

    foreach ($tadfiles as $tadfile) {
        // collect data on course
        $coursedata = get_course_data($coursedatasql, $tadfile, null);
	    if($coursedata){
            // get department name
            $departmentname = get_department_names($lang, $tadfile);
            // reparse semester str for tha drips
            $semesterstring = substr($coursedata->semester, 0, 4) . '/' . substr($coursedata->semester,4);
            $semesterstring = substr($semesterstring, 0, 7) . '/' . substr($semesterstring, 7);

            // Create placeholder links
            if (strcmp($coursedata->dlurl, 'uploading') === 0){
                $dlink = '<p>' . get_string('upload_in_progress', 'local_tad'). '</p>';
            } else if (strcmp($coursedata->dlurl, 'not_available') === 0){
                $dlink = '<p>' . get_string('tad_not_available', 'local_tad'). '</p>';
            } else if (strcmp($coursedata->dlurl, 'cross') === 0){
                $dlink = '<p>' . get_string('tad_not_available', 'local_tad'). '</p>';
            } else {
                $dlink = '<a href="' .$coursedata->dlurl. '" target="_blank">'. get_string('file_heading', 'local_tad') . '</a>';
            }

            // consctruct TAD as object
            $tad = new TadObject(
                $coursedata->author,
                $coursedata->coursecode,
                $semesterstring,
                $departmentname,
                str_replace('"','',$coursedata->tadname),
                $coursedata->timecreated,
                'irrelevant',
                $dlink,
                0
            );

            foreach ($tad->corriculum_names as $c) {
		        $temp = $tad->get_as_templatecontext();
		        if (strcmp($c, '-') !== 0){
                    $temp["corriculum_name"] = $c;
		        } else {
                    $temp["corriculum_name"] = 'BME karra átoktatott';
		        }
                array_push($templatecontent, $temp);
            }
        } else {
            //var_dump($tadfile);
            //continue;
            // get department name
            $departmentname = get_department_names($lang, $tadfile);
            // reparse semester str for tha drips
            $semesterstring = substr($tadfile->semester, 0, 4) . '/' . substr($tadfile->semester,4);
            $semesterstring = substr($semesterstring, 0, 7) . '/' . substr($semesterstring, 7);

            // Create placeholder links
            if (strcmp($tadfile->dlurl, 'uploading') === 0){
                $dlink = '<p>' . get_string('upload_in_progress', 'local_tad'). '</p>';
            } else if (strcmp($tadfile->dlurl, 'not_available') === 0){
                $dlink = '<p>' . get_string('tad_not_available', 'local_tad'). '</p>';
            } else if (strcmp($tadfile->dlurl, 'cross') === 0){
                $dlink = '<p>' . get_string('tad_not_available', 'local_tad'). '</p>';
            } else {
                $dlink = '<a href="' .$tadfile->dlurl. '" target="_blank">'. get_string('file_heading', 'local_tad') . '</a>';
            }
            $tad = new TadObject(
                '',
                $tadfile->coursecode,
                $semesterstring,
                $departmentname,
                str_replace('"','',$tadfile->name),
                $tadfile->timecreated,
                'irrelevant',
                $dlink,
                0,
            );foreach ($tad->corriculum_names as $c) {
		        $temp = $tad->get_as_templatecontext();
		        if (strcmp($c, '-') !== 0){
                    $temp["corriculum_name"] = $c;
		        } else {
                    $temp["corriculum_name"] = 'BME karra átoktatott';
		        }
                array_push($templatecontent, $temp);
            }
            //array_push($templatecontent, $tad->get_as_templatecontext());
        }
    }
    
    $fulltemplatecontext = array(
        'tad_announcement'          => get_string('tad_announcement', 'local_tad'),
        'id_heading'                => get_string('id_heading', "local_tad"),
        'course_code_heading'       => get_string('course_code_heading', "local_tad"),
        'course_name_heading'       => get_string('course_name_heading', "local_tad"),
        'department_heading'        => get_string('department_heading', "local_tad"),
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
        'semesterurls'              => $semesterurls,
        'rows'                      => $templatecontent,
        'corr_default_label'        => get_string('corr_default_label', 'local_tad'),
    );
    return $fulltemplatecontext;
}

function save_tad_files(){
    $fs = get_file_storage();
    $files = $fs->get_area_files(1, 'local_tad', 'temp');
    $freshupload = array();
    foreach ($files as $f) {
        if ($f->get_filename() == '.'){
            $f->delete();
            continue;
        }
        array_push($freshupload, $f->get_filename());
        $filerecord = array(
            'contextid'     =>  1,
            'component'     =>  'local_tad', 
            'filearea'      =>  'attachment',
            'itemid'        =>  0, 
            'filepath'      =>  '/', 
            'filename'      =>  $f->get_filename(),
            'timecreated'   =>  time(), 'timemodified'=>time()
        );
        try{
            $fs->create_file_from_storedfile($filerecord, $f);
            $f->delete();
        } catch (Throwable $th){
            $f->delete();
            continue;
        }
    }
    return $freshupload;
}

function is_duplicate_tad($tadfile){
    global $DB;
    $records = $DB->get_records('tad');
    foreach ($records as $record) {
        if (strcmp($tadfile->coursecode, $record->coursecode) == 0 && strcmp($tadfile->semester, $record->semester) == 0){
            return true;
        }
    }
    return false;
}

function ingest_tad_db($semester){
    global $DB;

    $coursedatasql = "
        SELECT name, code, coursename 
        FROM {tad_corriculum}
        WHERE coursecode = :coursecode
    ";
    $processthis = save_tad_files();

    $tadfiles = get_tad_files();
    foreach ($tadfiles as $f) {
        foreach ($processthis as $tad => $filename) {
            $tadfile = new TadFileObject($f);
            if (strcmp($tadfile->filename, $filename) !==0 ){
                continue;
            }
            if (is_duplicate_tad($tadfile)){
                continue;
            }
            if($coursedata = $DB->get_record_sql($coursedatasql, ['coursecode' => $tadfile->coursecode])){
                create_tad_record($coursedata, $tadfile, $semester);
            } else {
                continue;
            }
        }
    }
}

function create_tad_record($coursedata, $tadfile, $semester){
    $tad = new DBTadObject(
        $coursedata->coursename,
        $tadfile->author,
        0,
        $tadfile->coursecode,
        $tadfile->dllink,
        $semester,
        $tadfile->timecreated,
        $tadfile->timecreated,
    );
    $tad->save_to_db();
}

function create_tad_corriculum_in_db($tad){
    global $DB;
    if(!$DB->insert_record('tad_corriculum', $tad)){
        return false;
    };
}

function create_dummy_tad_in_db($tad){
    global $DB;
    if(!$DB->insert_record('tad', $tad)){
        return false;
    };
    return true;
}

// Parse corriculum csv file
function parse_corriculum_csv_file($separator){
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
            // split line on separator, encode stuff
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
        var_dump($th);
        die;
        return false;
    }
}

function delete_tad_entries($arr){
    if (count($arr) == 0){
        return false;
    }
    try{
        global $DB;
        // Delete the files
        $fs = get_file_storage();
        if(!$files = $fs->get_area_files(1,'local_tad','attachment')){
        } else {
            foreach ($files as $f) {
                $filename = $f->get_filename();
                foreach ($arr as $a) {
                    if (strcmp($filename.".pdf", $a) === 0){
                        $f->delete();
                    } else {
                        continue;
                    }
                }
            }
        }
        // Delete the records
        foreach ($arr as $a) {
            $coursecode = explode('_',$a)[1];
            $ids = array();
            try {
                $rec = $DB->get_records_sql('SELECT id FROM {tad} WHERE ' . $DB->sql_like('coursecode', ':coursecode', $casesensitive=false ), array('coursecode' => $coursecode));
            } catch (Throwable $th){}
            foreach ($rec as $r) {
                array_push($ids, $r->id);
            }
            foreach ($ids as $id) {
                try{
                    $DB->delete_records('tad',  ['id' => $id]);
                } catch (Throwable $th){}
            }
        }
        return $arr;
    } catch (Throwable $th){
        return false;
    }
}

// Parse corriculum csv file
function parse_dummy_tad_csv_file($separator){
    // read csv file
    $fs = get_file_storage();
    try {
        $files = $fs->get_area_files(1, 'local_tad', 'csv_temp');
        // last element of pesky arrays
        $file = end($files);
        $filecontent = $file->get_content();
        // split on newline
        $cont = explode(PHP_EOL, $filecontent);
        foreach ($cont as $line) {
            // split line on separator, encode stuff
            $linecont = explode($separator, utf8_encode($line));
            // check if line is empty
            if (!$linecont[0] == '' && !$linecont[1] == ''){
                $tad               = new stdClass();
                $tad->name         = $linecont[0];
                $tad->author       = $linecont[1];
                $tad->editable     = $linecont[2];
                $tad->coursecode   = $linecont[3];
                $tad->dlurl        = $linecont[4];
                $tad->semester     = intval($linecont[5]);
                $tad->timerelevant = intval($linecont[6]);
                $tad->timecreated  = intval($linecont[7]);
                $tad->version      = intval($linecont[8]);
                try{
                    create_dummy_tad_in_db($tad);
                    $file->delete();
                } catch (Throwable $th){
                    var_dump($th);
                    die;
                }
                };
            }
            // Delete csv file
            $file->delete();
            die;
            return true;
    } catch(Throwable $th){
        $file->delete();
        var_dump($th);
        die;
    }
}

function create_tad_from_formdata($formdata){
    global $USER;
    global $DB;
    try{
        $tad = new tadSection1($formdata, $USER->id);
        var_dump($formdata);
        die;
        $DB->insert_record('tad_section_1', $tad);
        return true;
    } catch (Throwable $th){
        var_dump($th);
        die;
        return false;
    }
}