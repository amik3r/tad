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

$PAGE->set_url(new moodle_url('/local/tad/editall.php'), ['id' => $PAGE->url->get_param('id'),'list' => $PAGE->url->get_param('list'), 'clone' => $PAGE->url->get_param('clone')]);
$PAGE->set_context(\context_system::instance());
$PAGE->set_title('TAD Létrehozása');
$PAGE->set_heading('TAD Létrehozása');
$context = $PAGE->context;
$PAGE->requires->css(new moodle_url('./static/style/tadform.css'));
$PAGE->requires->css(new moodle_url('./static/style/tadSection1.css'));
$PAGE->requires->js(new moodle_url('./static/scripts/tadEditor.js'));
$PAGE->requires->js(new moodle_url('./static/scripts/section2.js'));
$PAGE->requires->js(new moodle_url('./static/scripts/section3.js'));
$PAGE->requires->js(new moodle_url('./static/scripts/section4.js'));
$PAGE->requires->jquery();
$CFG->cache_js = false;


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

// if not in list view
if (!$PAGE->url->get_param('list')){
    $mform = new tadSectionAll();
    $departmentsObj = new Department();
    $departments = $departmentsObj->get_departments_with_code();
    // if editing a specific entry
    if ($id = $PAGE->url->get_param('id')){
        $editing = true;
        $data = gatherTadData($id);
        $data['validby'] = gmdate("Y-m-d",intval($data['validby']));
        $data['validuntil'] = gmdate("Y-m-d",intval($data['validuntil']));
        $data['validby_2'] = gmdate("Y-m-d",intval($data['validby_2']));
        $data['validuntil_2'] = gmdate("Y-m-d",intval($data['validuntil_2']));
        $data['validby_3'] = gmdate("Y-m-d",intval($data['validby_3']));
        $data['validuntil_3'] = gmdate("Y-m-d",intval($data['validuntil_3']));
        $data['departments'] = $departments;
        $data['department_selected_code'] = $departmentsObj->get_code($data['ou']);
        $mform->templatestuff = ["data" => $data];
        if ($PAGE->url->get_param('clone')){
            // if cloning
            $mform->set_data(['editable' => ($canedit ? 'required' : ''), 'id' => $id, 'clone' => $PAGE->url->get_param('clone')]);
        }
        $mform->set_data(['editable' => ($canedit ? 'required' : ''), 'id' => $id]);
    // if not in list view and creating a new entry 
    } else {
        $data['departments'] = $departments;
        $mform->templatestuff = ["data" => $data];
        $mform->set_data(['editable' => ($canedit ? 'required' : ''), 'id' => 0]);
    }
    if ($mform->is_cancelled()) {
        redirect($CFG->wwwroot . '/local/tad/editall.php?list=true',  get_string("upload_cancelled", "local_tad"), \core\output\notification::NOTIFY_INFO);
    } else if ($formdata = $mform->get_data()) {  
        create_tad_from_formdata($formdata, $formdata->id, $clone=$formdata->clone);
        redirect($CFG->wwwroot . '/local/tad/editall.php?list=true',  get_string("upload_cancelled", "local_tad"), \core\output\notification::NOTIFY_INFO);
    }
} else {
    $data = get_all_custom_tads();
    $templatestuff = $data;
}

echo $OUTPUT->header();
if (!$PAGE->url->get_param('list')){
    $mform->display();
} else {
    echo $OUTPUT->render_from_template('local_tad/list_tads', $templatestuff);
} 
if ($editing) {
    echo "<h1>Szerkesztő nézet</h1><br>";
}
//echo $OUTPUT->render_from_template('local_tad/tadsection1', []);
echo $OUTPUT->footer();