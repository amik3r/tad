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

$PAGE->set_context(\context_system::instance());
$PAGE->set_url(new moodle_url('/local/tad/admin.php'));
$PAGE->set_title('TAD Admin Site');
$PAGE->set_heading('TAD Admin');

$PAGE->requires->jquery();
$PAGE->requires->js(new moodle_url('./static/scripts/datatables.js'), false);
$PAGE->requires->css(new moodle_url('./static/style/view.css'));
$PAGE->requires->css(new moodle_url('./static/style/datatables.css'));

$context = $PAGE->context;
//require_capability('local/tad:manager', $context);
if (!has_capability('local/tad:manager', $context)) {
    redirect($CFG->wwwroot . '/local/tad/view.php' );
}

// PDF uploader form
$mform = new upload();
if ($mform->is_cancelled()) {
    redirect($CFG->wwwroot . '/local/tad/admin.php',  get_string("upload_cancelled", "local_tad"), \core\output\notification::NOTIFY_INFO);
} else if ($fromform = $mform->get_data()) {
    // instert new data into DB
    if ($data = $mform->get_data()) {
        $semester = $fromform->semester;
        // Set semester to admin setting value
        if(is_null($semester)){
            $semester = get_config('local_tad', 'semester');
        }
        // remove slashes
        $semester = str_replace('/','',$semester);
        try{
            file_save_draft_area_files($data->attachment, $PAGE->context->id, 'local_tad', 'temp', $data->attachment, array('subdirs' => 0, 'maxbytes' => 500000000, 'maxfiles' => 5000));
            ingest_tad_db($semester);
            redirect($CFG->wwwroot . '/local/tad/admin.php', get_string("upload_successful", "local_tad"), \core\output\notification::NOTIFY_SUCCESS);
        } catch(Throwable $th) {
            redirect($CFG->wwwroot . '/local/tad/admin.php', get_string("upload_failed", "local_tad", \core\output\notification::NOTIFY_ERROR));
        };
    };
};

// CSV data uploader form
$mform2 = new uploadCsv();
if ($mform2->is_cancelled()) {
    // Go back to view if cancelled
    redirect($CFG->wwwroot . '/local/tad/admin.php',  get_string("upload_cancelled", "local_tad"), \core\output\notification::NOTIFY_INFO);
} else if ($fromform = $mform2->get_data()) {
    // clean up previous csv files
    $fs = get_file_storage();
    //$fs->delete_area_files(1,'local_tad','csv_temp');
    if ($data = $mform2->get_data()) {
        $separator = $data->separator;
        try{
            file_save_draft_area_files($data->attachment, 1, 'local_tad', 'csv_temp', $data->attachment, array('subdirs' => 0, 'maxbytes' => 500000000, 'maxfiles' => 1));
            if (!parse_csv_file($separator)){
                redirect($CFG->wwwroot . '/local/tad/admin.php', get_string("csv_parse_error", "local_tad", \core\output\notification::NOTIFY_ERROR));
            };
            redirect($CFG->wwwroot . '/local/tad/admin.php',  get_string("upload_successful", "local_tad"), \core\output\notification::NOTIFY_INFO);
        } catch(Throwable $th) {
            redirect($CFG->wwwroot . '/local/tad/admin.php', get_string("upload_failed", "local_tad", \core\output\notification::NOTIFY_ERROR));
        };
    };
};
echo $OUTPUT->header();

$mform->display();
echo "<hr>";
$mform2->display();
echo "<hr>";

$templatecontent = construct_view_table(current_language(), get_config('local_tad', 'semester'));
$templatecontent['url'] = $PAGE->url;

echo "<hr>";
echo $OUTPUT->render_from_template('local_tad/admintable', $templatecontent);

echo $OUTPUT->footer();
