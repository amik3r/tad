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

$PAGE->set_context(\context_system::instance());
$semesterstr = $PAGE->url->get_param('semester');
$PAGE->set_url(new moodle_url('/local/tad/view.php'));
$PAGE->set_title('TAD Portál');
$PAGE->set_heading('TAD Portál');
$CFG->cachejs = false;

$PAGE->requires->jquery();
$PAGE->requires->js(new moodle_url('./static/scripts/datatables.js'), false);
$PAGE->requires->css(new moodle_url('./static/style/view.css'));
$PAGE->requires->css(new moodle_url('./static/style/datatables.css'));

require_once($CFG->libdir.'/adminlib.php');
global $DB;
if ($semesterstr) {
    $templatecontent = construct_view_table(current_language(), $semesterstr);
    $templatecontent['url'] = $PAGE->url;
} else {
    $templatecontent = construct_view_table(current_language(), get_config('local_tad', 'semester'));
    $templatecontent['url'] = $PAGE->url;
}

echo $OUTPUT->header();
echo $OUTPUT->render_from_template('local_tad/table2', $templatecontent);
echo $OUTPUT->footer();
