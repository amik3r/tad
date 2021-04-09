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

class tadSection4 extends moodleform {
    public $readonly;
    public $approveable;
    public function definition() {
        $mform = $this->_form;
        $stringman = get_string_manager();
        $mform->addElement('hidden', 's_2_1', $stringman->get_string('2_1', 'local_tad', null, 'hu') . '/' . $stringman->get_string('2_1', 'local_tad', null, 'en'));
        $mform->setType('s_2_1', PARAM_NOTAGS);
        $mform->setDefault('s_2_1', '');
        $mform->addElement('hidden', 's_2_2_1', $stringman->get_string('2_2_1', 'local_tad', null, 'hu') . '/' . $stringman->get_string('2_2_1', 'local_tad', null, 'en'));
        $mform->setType('s_2_2_1', PARAM_NOTAGS);
        $mform->setDefault('s_2_2_1', '');
        $mform->addElement('hidden', 's_2_2_2', $stringman->get_string('2_2_2', 'local_tad', null, 'hu') . '/' . $stringman->get_string('2_2_2', 'local_tad', null, 'en'));
        $mform->setType('s_2_2_2', PARAM_NOTAGS);
        $mform->setDefault('s_2_2_2', '');
        $mform->addElement('hidden', 's_2_2_3', $stringman->get_string('2_2_3', 'local_tad', null, 'hu') . '/' . $stringman->get_string('2_2_3', 'local_tad', null, 'en'));
        $mform->setType('s_2_2_3', PARAM_NOTAGS);
        $mform->setDefault('s_2_2_3', '');
        $mform->addElement('hidden', 's_2_2_4', $stringman->get_string('2_2_4', 'local_tad', null, 'hu') . '/' . $stringman->get_string('2_2_4', 'local_tad', null, 'en'));
        $mform->setType('s_2_2_4', PARAM_NOTAGS);
        $mform->setDefault('s_2_2_4', '');
        $mform->addElement('hidden', 's_2_3', $stringman->get_string('2_3', 'local_tad', null, 'hu') . '/' . $stringman->get_string('2_3', 'local_tad', null, 'en'));
        $mform->setType('s_2_3', PARAM_NOTAGS);
        $mform->setDefault('s_2_3', '');
        $mform->addElement('hidden', 's_2_4', $stringman->get_string('2_4', 'local_tad', null, 'hu') . '/' . $stringman->get_string('2_4', 'local_tad', null, 'en'));
        $mform->setType('s_2_4', PARAM_NOTAGS);
        $mform->setDefault('s_2_4', '');

        // Disabling elements based on access
        $mform->addElement('hidden', 'editable');
        $mform->addElement('hidden', 'approvable');
        $mform->setType('editable', PARAM_NOTAGS);
        $mform->setDefault('editable', '');
        $mform->setType('approvable', PARAM_NOTAGS);
        $mform->setDefault('approvable', '');

    }
    public function definition_after_data() {
        global $OUTPUT;
        parent::definition_after_data();
        $mform =& $this->_form;
        $readonly_data = $mform->getElement('editable');
        $readonly = $readonly_data->_attributes['value'];
        $templatestuff = ['readonly' => $readonly];
        //$mform->addElement('html', $OUTPUT->render_from_template('local_tad/tadsection4', $templatestuff));
        if ($readonly !== 'disabled'){
            $this->add_action_buttons(); 
        }
    }
}
