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

$PAGE->set_url(new moodle_url('/local/tad/editall.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title('TAD Létrehozása');
$PAGE->set_heading('TAD Létrehozása');
$context = $PAGE->context;
$PAGE->requires->css(new moodle_url('./static/style/tadform.css'));
$PAGE->requires->css(new moodle_url('./static/style/tadSection1.css'));
$PAGE->requires->js(new moodle_url('./static/scripts/tadEditor.js'));
$PAGE->requires->js(new moodle_url('./static/scripts/section2.js'));
$PAGE->requires->js(new moodle_url('./static/scripts/section3.js'));
$PAGE->requires->jquery();


// Enable!!!!!
// Disable access to unauthorised personnel
//require_capability('local/tad:viewer', $context);

// Load form when 'authencticated'
//require_once($CFG->dirroot . '/local/tad/classes/form/createTadForm.php');
//require_once($CFG->dirroot . '/local/tad/classes/form/createTadForm2.php');
require_once($CFG->dirroot . '/local/tad/classes/form/tadSectionAll.php');

// See if can edit form
$canedit = false;
$canapprove = false;
if (has_capability('local/tad:manager', $context)){
    $canedit = true;
}
if (has_capability('local/tad:approver', $context)){
    $canapprove = true;
}
$canapprove = true;
$canedit = false;

$section = intval($PAGE->url->get_param('section'));

$mform = new tadSectionAll();
$mform->set_data(['editable' => ($canedit ? 'required' : '')]);
if ($mform->is_cancelled()) {
    redirect($CFG->wwwroot . '/local/tad/editall.php',  get_string("upload_cancelled", "local_tad"), \core\output\notification::NOTIFY_INFO);
} else if ($formdata = $mform->get_data()) {        
    create_tad_from_formdata($formdata);
}

echo $OUTPUT->header();
//echo $OUTPUT->render_from_template('local_tad/tadsection1', []);
$mform->display();
echo $OUTPUT->footer();