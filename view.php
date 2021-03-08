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

global $DB;
global $USER;

require_once(__DIR__    . '/../../config.php');
require_once(__DIR__    . './classes/form/semester_select.php');
require_once(__DIR__    . './locallib.php');
require_once(__DIR__    . './classes/tad/tadfileobject.php');
require_once(__DIR__    . './classes/tad/tadobject.php');
$CFG->cachejs = false;
$PAGE->set_context(\context_system::instance());
$url = $PAGE->url;
$PAGE->set_url(new moodle_url('/local/tad/view.php'));
$PAGE->set_title('TAD');
$PAGE->set_heading('TAD');

$PAGE->requires->jquery();
$PAGE->requires->js(new moodle_url('./scripts/script.js'), true);

//$templatecontent = array();
//$tadfiles = get_all_tad_files();
//
//$i = 0;
//foreach ($tadfiles as $f) {
//    $i++;
//    $tadfile = new TadFileObject($f);
//    $tad = new TadObject(
//        $tadfile->author,
//        $tadfile->coursecode,
//        'semester',
//        $tadfile->entity,
//        $tadfile->fullname,
//        $tadfile->timecreated,
//        $tadfile->filename,
//        $tadfile->dllink,
//        $i
//    );
//    array_push($templatecontent, $tad->get_as_templatecontext());
//}
//$fulltemplatecontext = array(
//    'id_heading'                => get_string('id_heading', "local_tad"),
//    'author_heading'            => get_string('author_heading', "local_tad"),
//    'course_code_heading'       => get_string('course_code_heading', "local_tad"),
//    'course_name_heading'       => get_string('course_name_heading', "local_tad"),
//    'entity_heading'            => get_string('entity_heading', "local_tad"),
//    'time_created_heading'      => get_string('time_created_heading', "local_tad"),
//    'file_heading'              => get_string('file_heading', "local_tad"),
//    'label_noresult'            => get_string('label_noresult', "local_tad"),
//    'semester_heading'          => get_string('semester_heading', "local_tad"),
//    'rows'                      => $templatecontent,
//);
require_once($CFG->libdir.'/adminlib.php');
global $DB;
$mform = new semester_select();
if ($fromform = $mform->get_data()) {
    $templatecontent = construct_view_table($fromform->semester);
} else {
    $templatecontent = construct_view_table(get_config('local_tad', 'semester'));
}



echo $OUTPUT->header();
$mform->display();
if($viewid = $url->get_param('id')){
    echo $OUTPUT->render_from_template('local_tad/table', $templatecontent);
}
echo $OUTPUT->render_from_template('local_tad/table', $templatecontent);
echo $OUTPUT->footer();