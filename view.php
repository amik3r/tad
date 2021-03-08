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
require_once(__DIR__    . '/classes/form/semester_select.php');
require_once(__DIR__    . '/locallib.php');
require_once(__DIR__    . '/classes/tad/tadfileobject.php');
require_once(__DIR__    . '/classes/tad/tadobject.php');
$CFG->cachejs = false;
$PAGE->set_context(\context_system::instance());
$url = $PAGE->url;
$PAGE->set_url(new moodle_url('/local/tad/view.php'));
$PAGE->set_title('TAD');
$PAGE->set_heading('TAD');

$PAGE->requires->jquery();
$PAGE->requires->js(new moodle_url('./scripts/script.js'), true);

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