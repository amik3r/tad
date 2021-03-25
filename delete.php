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

require_once(__DIR__ . '/../../config.php');
require_once(__DIR__ . '/locallib.php');

// From imports
require_once($CFG->dirroot . '/local/tad/classes/form/upload.php');
require_once($CFG->dirroot . '/local/tad/classes/form/upload_csv.php');
require_login();



$PAGE->set_url(new moodle_url('/local/tad/delete.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title('TAD Admin Site');
$PAGE->set_heading('TAD Admin');
$PAGE->requires->jquery();
$PAGE->requires->js(new moodle_url('./static/scripts/datatables.js'), false);
$PAGE->requires->js(new moodle_url('./static/scripts/admin.js'), false);
$PAGE->requires->css(new moodle_url('./static/style/view.css'));
$PAGE->requires->css(new moodle_url('./static/style/datatables.css'));
$context = $PAGE->context;

$url = $PAGE->url;
try {
    $params = $url->get_param('todelete');
    $deletearray = explode(',' ,$params);
} catch(Throwable $th){
    $deletearray = '';
};

require_capability('local/tad:manager', $context);
if (is_null($deletearray) || count($deletearray) >= 1){
    if (!delete_tad_entries($deletearray)){
        redirect($CFG->wwwroot . '/local/tad/admin.php');
    } else {
        redirect($CFG->wwwroot . '/local/tad/admin.php');
    }
} else {
    echo count($deletearray);
}

echo $OUTPUT->header();
foreach ($deletedarray as $d) {
    echo "<p>Deleted: ". $d . "</p><br>";
}
echo "<a href=" . $CFG->wwwroot . "/local/tad/admin.php" . ">Go back</a>";
echo $OUTPUT->footer();
