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

//moodleform is defined in formslib.php
require_once("$CFG->libdir/formslib.php");

class upload extends moodleform {
    public function definition() {
        $mform = $this->_form;

        $mform->addElement('filemanager', 'attachment', get_string("uploadlabel", "local_tad"), null,
                    array('subdirs' => 0, 'maxbytes' => 0, 'areamaxbytes' => 1048576000, 'maxfiles' => 5000,
                          'accepted_types' => '*', 'return_types'=> 1 | 2));

        $options = array(
            '2020/21/02' => '2020/21/02',
            '2021/22/01' => '2021/22/01'
        );
        $select = $mform->addElement('select', 'semester', get_string('semester_select_label', 'local_tad'), $options);
        // This will select the colour blue.
        $select->setSelected('2020/21/02');
        $mform->setDefault('semester','2020/21/02');

        $this->add_action_buttons();
    }
}