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
 * @copyright 2020, You Name <your@email.address>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once("$CFG->libdir/formslib.php");

class uploadCourseList extends moodleform {
    public function definition() {
        $mform = $this->_form;
        $mform->addElement('filemanager', 'attachment', get_string("csv_upload_label", "local_tad"), null,
                    array('subdirs' => 0, 'maxbytes' => 0, 'areamaxbytes' => 1048576000, 'maxfiles' => 1,
                          'accepted_types' => '*', 'return_types'=> 1 | 2));

        $mform->addElement('text', 'coursecode', get_string('csv_separator_label', 'local_tad'));
        $mform->setType('coursecode', PARAM_NOTAGS);
        $mform->setDefault('coursecode', ',');

        $mform->addElement('text', 'enname', get_string('csv_separator_label', 'local_tad'));
        $mform->setType('enname', PARAM_NOTAGS);
        $mform->setDefault('enname', ',');

        $mform->addElement('text', 'hunname', get_string('csv_separator_label', 'local_tad'));
        $mform->setType('hunname', PARAM_NOTAGS);
        $mform->setDefault('hunname', ',');

        $mform->addElement('text', 'hudepartment', get_string('csv_separator_label', 'local_tad'));
        $mform->setType('hunname', PARAM_NOTAGS);
        $mform->setDefault('hunname', ',');

        $mform->addElement('text', 'endepartment', get_string('csv_separator_label', 'local_tad'));
        $mform->setType('hunname', PARAM_NOTAGS);
        $mform->setDefault('hunname', ',');
        $mform->addElement('text', 'semester', get_string('csv_separator_label', 'local_tad'));
        $mform->setType('semester', PARAM_NOTAGS);
        $mform->setDefault('semester', ',');
        
        $this->add_action_buttons();
    }
}