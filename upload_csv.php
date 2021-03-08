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
require_once($CFG->dirroot . '/local/tad/classes/form/upload_csv.php');
require_login();

$PAGE->set_context(\context_system::instance());
$PAGE->set_url(new moodle_url('/local/banner/create.php'));
$PAGE->set_title('TAD Upload');
$PAGE->set_heading('TAD Upload');

$mform = new upload();

if ($mform->is_cancelled()) {
    // Go back to manage
    redirect($CFG->wwwroot . '/local/tad/view.php',  get_string("upload_cancelled", "local_tad"), \core\output\notification::NOTIFY_INFO);
    //Handle form cancel operation, if cancel button is present on form
} else if ($fromform = $mform->get_data()) {

    // Save temp file
    if ($data = $mform->get_data()) {
        try{
            file_save_draft_area_files($data->attachment, 1, 'local_tad', 'csv_temp', $data->attachment, array('subdirs' => 0, 'maxbytes' => 500000000, 'maxfiles' => 1));
            // read csv file
            $fs = get_file_storage();
            $file = $fs->get_area_files(1, 'local_tad', 'csv_temp');
            // Parse csv file
            foreach ($file as $f) {
                $cont = explode(PHP_EOL, $f->get_content());
                foreach ($cont as $line) {
                    $linecont = explode(',',utf8_encode($line));
                    if ($linecont[0] == ''|| $linecont[1] == ''){

                    } else {
                        $corriculum_entry = new stdClass();
                        $corriculum_entry->coursename = $linecont[3];
                        $corriculum_entry->coursecode= $linecont[2];
                        $corriculum_entry->version = 1;
                    }
                }
                // Delete file
                $f->delete();
}
        } catch(Throwable $th) {
            redirect($CFG->wwwroot . '/local/tad/view.php', get_string("upload_failed", "local_tad", \core\output\notification::NOTIFY_ERROR));
        };
    };
};
echo $OUTPUT->header();
$mform->display();
echo $OUTPUT->footer();
