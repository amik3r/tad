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

//function sendfile_to_ws($file){
//    $data = array('data'=>$file);
//    $targeturl = 'http://localhost:5000';
//    $curl = curl_init($targeturl);
//    curl_setopt($curl, CURLOPT_POST, true);
//    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
//    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//    $response = curl_exec($curl);
//    curl_close($curl);
//    return $response;
//}

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

function construct_view_table($semester){
    global $DB;
    $coursenameSQL = "
        SELECT DISTINCT coursename 
        FROM {tad_corriculum}
        WHERE coursecode = :coursecode
    ";

    $templatecontent = array();
    $tadfiles = get_all_temp_tad_files();
    $i = 0;
    foreach ($tadfiles as $f) {
        $i++;
        $tadfile = new TadFileObject($f);
        if($coursename = $DB->get_record_sql($coursenameSQL, ['coursecode' => $tadfile->coursecode])){
            $tad = new TadObject(
                $tadfile->author,
                $tadfile->coursecode,
                $semester,
                $tadfile->entity,
                $coursename->coursename,
                $tadfile->timecreated,
                $tadfile->filename,
                $tadfile->dllink,
                $i
            );
            array_push($templatecontent, $tad->get_as_templatecontext());
        }
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
        'rows'                      => $templatecontent,
    );
    return $fulltemplatecontext;
}

function create_tad_corriculum_in_db($tad){
    global $DB;
    $DB->insert_record('tad_corriculum', $tad);
}