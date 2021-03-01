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

require_once(__DIR__ . '/../../config.php');

$CFG->cachejs = false;
$PAGE->set_context(\context_system::instance());
$PAGE->requires->jquery();

$PAGE->set_url(new moodle_url('/local/tad/view.php'));
$PAGE->set_title('TAD');
$PAGE->set_heading('TAD');

$filesql = "
SELECT * FROM {files}
WHERE filename 
    LIKE :filepattern 
AND component = :filearea

";
//AND mimetype LIKE 'application/pdf'

$entitysql = "
SELECT course.fullname, category.name 
FROM {course} course
INNER JOIN {course_categories} category
ON course.category = category.id
AND course.shortname LIKE :coursecode
";


$rows = $DB->get_records_sql($filesql, ['filepattern' => "TAD%", 'filearea' => 'local_tad']);

$templatecontent = array();

foreach ($rows as $r) {
    $filename = $r->filename;
    $author = $r->author;
    $timecreated = $r->timecreated;
    $itemid = $r->itemid;
    $contextid = $r->contextid;
    $component = $r->component;
    $filearea = $r->filearea;
    $filepath = $r->filepath;
    
    $fullname = 'Tantárgy neve';
    $entity = 'tanszék';

    $x = explode("_", $filename);

    $coursecode = explode('.',$x[1])[0];
    
    if($coursedetails = $DB->get_record_sql($entitysql, ['coursecode' => $coursecode])){
        $fullname = $coursedetails->fullname;
        $entity = $coursedetails->name;
    };

    $dllink = moodle_url::make_pluginfile_url($contextid, 'local_tad', 'attachment', $itemid, $filepath, $filename, true);

    array_push($templatecontent, array(
        'author'        =>      $author,
        'coursename'    =>      $coursecode,
        'entity'        =>      $entity,
        'fullname'      =>      $fullname,
        'timecreated'   =>      date("Y-m-d h:i",$timecreated),
        'filename'      =>      $filename,
        'url'           =>      $dllink
    ));
}
$PAGE->requires->js(new moodle_url('./scripts/test.js'), true);

echo $OUTPUT->header();
echo $OUTPUT->render_from_template('local_tad/tr', array('rows' => $templatecontent));
echo $OUTPUT->footer();