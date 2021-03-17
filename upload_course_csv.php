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
require_once($CFG->dirroot . '/local/tad/classes/form/upload_course_list.php');
require_once(__DIR__    . '/locallib.php');

require_login();

$PAGE->set_context(\context_system::instance());
$PAGE->set_url(new moodle_url('/local/tad/upload_course_csv.php'));
$PAGE->set_title(get_string('csv_upload_label', 'local_tad'));
$PAGE->set_heading(get_string('csv_upload_label', 'local_tad'));

$mform = new uploadCourseList();
if ($mform->is_cancelled()) {
    // Go back to view if cancelled
    redirect($CFG->wwwroot . '/local/tad/view.php',  get_string("upload_cancelled", "local_tad"), \core\output\notification::NOTIFY_INFO);
} else if ($fromform = $mform->get_data()) {
    // clean up previous csv files
    $fs = get_file_storage();
    //$fs->delete_area_files(1,'local_tad','csv_temp');
    if ($data = $mform->get_data()) {
        $separator = $data->separator;
        try{
            file_save_draft_area_files($data->attachment, 1, 'local_tad', 'csv_temp', $data->attachment, array('subdirs' => 0, 'maxbytes' => 500000000, 'maxfiles' => 1));
            if (!parse_csv_file($separator)){
                redirect($CFG->wwwroot . '/local/tad/view.php', get_string("csv_parse_error", "local_tad", \core\output\notification::NOTIFY_ERROR));
            };
            redirect($CFG->wwwroot . '/local/tad/view.php',  get_string("upload_successful", "local_tad"), \core\output\notification::NOTIFY_INFO);
        } catch(Throwable $th) {
            redirect($CFG->wwwroot . '/local/tad/view.php', get_string("upload_failed", "local_tad", \core\output\notification::NOTIFY_ERROR));
        };
    };
};
echo $OUTPUT->header();
$mform->display();
echo $OUTPUT->footer();