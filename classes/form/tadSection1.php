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

class tadSection_1 extends moodleform {
    public $readonly;
    public $approveable;
    public function definition() {
        $mform = $this->_form;
        $stringman = get_string_manager();
        $mform->addElement('hidden', 's_1_2', $stringman->get_string('1_2', 'local_tad', null, 'hu') . "/" . $stringman->get_string('1_2', 'local_tad', null, 'en'));
        $mform->setType('s_1_2', PARAM_NOTAGS);
        $mform->setDefault('s_1_2', '');
        $mform->addElement('hidden', 's_1_6', $stringman->get_string('1_6', 'local_tad', null, 'hu'));
        $mform->setType('s_1_6', PARAM_NOTAGS);
        $mform->setDefault('s_1_6', '');
        $mform->addElement('hidden', 's_1_7_1', $stringman->get_string('1_7', 'local_tad', null, 'hu'));
        $mform->setType('s_1_7_1', PARAM_NOTAGS);
        $mform->setDefault('s_1_7_1', '');
        $mform->addElement('hidden', 's_1_7_2_1', $stringman->get_string('1_7', 'local_tad', null, 'hu'));
        $mform->setType('s_1_7_2_1', PARAM_NOTAGS);
        $mform->setDefault('s_1_7_2_1', '');
        $mform->addElement('hidden', 's_1_7_2_2', $stringman->get_string('1_7', 'local_tad', null, 'hu'));
        $mform->setType('s_1_7_2_2', PARAM_NOTAGS);
        $mform->setDefault('s_1_7_2_2', '');
        $mform->addElement('hidden', 's_1_7_3', $stringman->get_string('1_7', 'local_tad', null, 'hu'));
        $mform->setType('s_1_7_3', PARAM_NOTAGS);
        $mform->setDefault('s_1_7_3', '');
        $mform->addElement('hidden', 's_1_9', $stringman->get_string('1_9', 'local_tad', null, 'hu'));
        $mform->setType('s_1_9', PARAM_NOTAGS);
        $mform->setDefault('s_1_9', '');
        $mform->addElement('hidden', 's_1_10', $stringman->get_string('1_10', 'local_tad', null, 'hu'));
        $mform->setType('s_1_10', PARAM_NOTAGS);
        $mform->setDefault('s_1_10', '');
        $mform->addElement('hidden', 's_1_12_1', $stringman->get_string('1_12_1', 'local_tad', null, 'hu'));
        $mform->setType('s_1_12_1', PARAM_NOTAGS);
        $mform->setDefault('s_1_12_1', '');
        $mform->addElement('hidden', 's_1_12_2', $stringman->get_string('1_12_2', 'local_tad', null, 'hu'));
        $mform->setType('s_1_12_2', PARAM_NOTAGS);
        $mform->setDefault('s_1_12_2', '');
        $mform->addElement('hidden', 's_1_12_3', $stringman->get_string('1_12_3', 'local_tad', null, 'hu'));
        $mform->setType('s_1_12_3', PARAM_NOTAGS);
        $mform->setDefault('s_1_12_3', '');
        $mform->addElement('hidden', 's_1_12_4', $stringman->get_string('1_12_4', 'local_tad', null, 'hu'));
        $mform->setType('s_1_12_4', PARAM_NOTAGS);
        $mform->setDefault('s_1_12_4', '');
        $mform->addElement('hidden', 's_1_4_1', $stringman->get_string('1_4_1', 'local_tad', null, 'hu'));
        $mform->setType('s_1_4_1', PARAM_NOTAGS);
        $mform->setDefault('s_1_4_1', '');
        $mform->addElement('hidden', 's_1_4_2', $stringman->get_string('1_4_2', 'local_tad', null, 'hu'));
        $mform->setType('s_1_4_2', PARAM_NOTAGS);
        $mform->setDefault('s_1_4_2', '');
        $mform->addElement('hidden', 's_1_4_3', $stringman->get_string('1_4_3', 'local_tad', null, 'hu'));
        $mform->setType('s_1_4_3', PARAM_NOTAGS);
        $mform->setDefault('s_1_4_3', '');
        $mform->addElement('hidden', 's_1_1', $stringman->get_string('1_1', 'local_tad', null, 'hu'));
        $mform->setType('s_1_1', PARAM_NOTAGS);
        $mform->setDefault('s_1_1', '');
        $mform->addElement('hidden', 's_1_1_en', $stringman->get_string('1_1', 'local_tad', null, 'en'));
        $mform->setType('s_1_1_en', PARAM_NOTAGS);
        $mform->setDefault('s_1_1_en', '');
        $mform->addElement('hidden', 's_1_3', $stringman->get_string('1_3', 'local_tad', null, 'hu'));
        $mform->setType('s_1_3', PARAM_NOTAGS);
        $mform->setDefault('s_1_3', '');
        $mform->addElement('hidden', 's_1_3_en', $stringman->get_string('1_3', 'local_tad', null, 'en'));
        $mform->setType('s_1_3_en', PARAM_NOTAGS);
        $mform->setDefault('s_1_3_en', '');
        $mform->addElement('hidden', 's_1_5', $stringman->get_string('1_5', 'local_tad', null, 'hu'));
        $mform->setType('s_1_5', PARAM_NOTAGS);
        $mform->setDefault('s_1_5', '');
        $mform->addElement('hidden', 's_1_5_en', $stringman->get_string('1_5', 'local_tad', null, 'en'));
        $mform->setType('s_1_5_en', PARAM_NOTAGS);
        $mform->setDefault('s_1_5_en', '');
        $mform->addElement('hidden', 's_1_8', $stringman->get_string('1_8', 'local_tad', null, 'hu'));
        $mform->setType('s_1_8', PARAM_NOTAGS);
        $mform->setDefault('s_1_8', '');
        $mform->addElement('hidden', 's_1_8_en', $stringman->get_string('1_8', 'local_tad', null, 'en'));
        $mform->setType('s_1_8_en', PARAM_NOTAGS);
        $mform->setDefault('s_1_8_en', '');
        $mform->addElement('hidden', 's_1_11', $stringman->get_string('1_11', 'local_tad', null, 'hu'));
        $mform->setType('s_1_11', PARAM_NOTAGS);
        $mform->setDefault('s_1_11', '');
        $mform->addElement('hidden', 's_1_11_en', $stringman->get_string('1_11', 'local_tad', null, 'en'));
        $mform->setType('s_1_11_en', PARAM_NOTAGS);
        $mform->setDefault('s_1_11_en', '');
        $mform->addElement('hidden', 's_1_13');
        $mform->setType('s_1_13', PARAM_NOTAGS);
        $mform->setDefault('s_1_13', '');
        $mform->addElement('hidden', 's_1_13_en');
        $mform->setType('s_1_13_en', PARAM_NOTAGS);
        $mform->setDefault('s_1_13_en', '');
        $mform->addElement('hidden', 's_1_13_1');
        $mform->setType('s_1_13_1', PARAM_NOTAGS);
        $mform->setDefault('s_1_13_1', '');
        $mform->addElement('hidden', 's_1_13_2');
        $mform->setType('s_1_13_2', PARAM_NOTAGS);
        $mform->setDefault('s_1_13_2', '');

        // Disabling elements based on access
        
        $mform->addElement('hidden', 'editable');
        $mform->addElement('hidden', 'approvable');
        $mform->setType('editable', PARAM_NOTAGS);
        $mform->setDefault('editable', '');
        $mform->setType('required', PARAM_NOTAGS);
        $mform->setDefault('required', '');
        $mform->setType('approvable', PARAM_NOTAGS);
        $mform->setDefault('approvable', '');

    }
    public function definition_after_data() {
        global $OUTPUT;
        parent::definition_after_data();
        $mform =& $this->_form;
        $readonly_data = $mform->getElement('editable');
        $required_data = $mform->getElement('required');
        $readonly = $readonly_data->_attributes['value'];
        $templatestuff = ['readonly' => $readonly, 'required' => $required_data];
        $mform->addElement('html', $OUTPUT->render_from_template('local_tad/tadsection1', $templatestuff));
        if ($readonly !== 'disabled'){
            $this->add_action_buttons(); 
        }
    }
}
