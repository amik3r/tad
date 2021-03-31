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

class createTadForm extends moodleform {
    public function definition() {
        $mform = $this->_form;

        $stringman = get_string_manager();
        $mform->addElement('text', 's_1_2', $stringman->get_string('1_2', 'local_tad', null, 'hu') . "/" . $stringman->get_string('1_2', 'local_tad', null, 'en'));
        $mform->setType('s_1_2', PARAM_NOTAGS);
        $mform->setDefault('s_1_2', '');
        // 1.6
        $mform->addElement('text', 's_1_6', $stringman->get_string('1_6', 'local_tad', null, 'hu'));
        $mform->setType('s_1_6', PARAM_NOTAGS);
        $mform->setDefault('s_1_6', '');

        $mform->addElement('text', 's_1_7', $stringman->get_string('1_7', 'local_tad', null, 'hu'));
        $mform->setType('s_1_7', PARAM_NOTAGS);
        $mform->setDefault('s_1_7', '');

        // 1.9
        $mform->addElement('text', 's_1_9', $stringman->get_string('1_9', 'local_tad', null, 'hu'));
        $mform->setType('s_1_9', PARAM_NOTAGS);
        $mform->setDefault('s_1_9', '');

        // 1.10
        $mform->addElement('text', 's_1_10', $stringman->get_string('1_10', 'local_tad', null, 'hu'));
        $mform->setType('s_1_10', PARAM_NOTAGS);
        $mform->setDefault('s_1_10', '');

        
        $mform->addElement('html', '<table>');
        // 1.12
        $mform->addElement('html', '<tr>');
        $mform->addElement('html', '<td>');
        $mform->addElement('html', '<h3>Közvetlen előkövetelmények</h3>');
        $mform->addElement('html', '</td>');
        $mform->addElement('html', '<td>');
        $mform->addElement('html', '<h3>Kurzustípusok és óraszámok</h3>');
        $mform->addElement('html', '</td>');
        $mform->addElement('html', '</tr>');
        $mform->addElement('html', '<tr>');
        $mform->addElement('html', '<td>');
        // 1.12.1
        $mform->addElement('text', 's_1_12_1', $stringman->get_string('1_12_1', 'local_tad', null, 'hu'));
        $mform->setType('s_1_12_1', PARAM_NOTAGS);
        $mform->setDefault('s_1_12_1', '');
        // 1.12.2
        $mform->addElement('text', 's_1_12_2', $stringman->get_string('1_12_2', 'local_tad', null, 'hu'));
        $mform->setType('s_1_12_2', PARAM_NOTAGS);
        $mform->setDefault('s_1_12_2', '');
        // 1.12.3
        $mform->addElement('text', 's_1_12_3', $stringman->get_string('1_12_3', 'local_tad', null, 'hu'));
        $mform->setType('s_1_12_3', PARAM_NOTAGS);
        $mform->setDefault('s_1_12_3', '');
        // 1.12.4
        $mform->addElement('text', 's_1_12_4', $stringman->get_string('1_12_4', 'local_tad', null, 'hu'));
        $mform->setType('s_1_12_4', PARAM_NOTAGS);
        $mform->setDefault('s_1_12_4', '');
        $mform->addElement('html', '</td>');

        //1.4
        $mform->addElement('html', '<td>');
        // 1.4.1
        $mform->addElement('text', 's_1_4_1', $stringman->get_string('1_4_1', 'local_tad', null, 'hu'));
        $mform->setType('s_1_4_1', PARAM_NOTAGS);
        $mform->setDefault('s_1_4_1', '');
        // 1.4.2
        $mform->addElement('text', 's_1_4_2', $stringman->get_string('1_4_2', 'local_tad', null, 'hu'));
        $mform->setType('s_1_4_2', PARAM_NOTAGS);
        $mform->setDefault('s_1_4_2', '');
        // 1.4.3
        $mform->addElement('text', 's_1_4_3', $stringman->get_string('1_4_3', 'local_tad', null, 'hu'));
        $mform->setType('s_1_4_3', PARAM_NOTAGS);
        $mform->setDefault('s_1_4_3', '');
        $mform->addElement('html', '</td>');
        $mform->addElement('html', '</tr>');
        // table header
        $mform->addElement('html', '<tr>');
        $mform->addElement('html', '<th>');
        $mform->addElement('html', '<h3>Magyar</h3>');
        $mform->addElement('html', '</th>');
        $mform->addElement('html', '<th>');
        $mform->addElement('html', '<h3>Angol</h3>');
        $mform->addElement('html', '</th>');    

        // 1.1
        $mform->addElement('html', '<tr>');
        $mform->addElement('html', '<td>');
        // Magyar
        $mform->addElement('text', 's_1_1', $stringman->get_string('1_1', 'local_tad', null, 'hu'));
        $mform->setType('s_1_1', PARAM_NOTAGS);
        $mform->setDefault('s_1_1', '');
        $mform->addElement('html', '</td>');
        $mform->addElement('html', '<td>');
        // Angol
        $mform->addElement('text', 's_1_1_en', $stringman->get_string('1_1', 'local_tad', null, 'en'));
        $mform->setType('s_1_1_en', PARAM_NOTAGS);
        $mform->setDefault('s_1_1_en', '');
        $mform->addElement('html', '</td>');
        $mform->addElement('html', '</tr>');

        // 1.3
        $mform->addElement('html', '<tr>');
        $mform->addElement('html', '<td>');
        // Magyar
        $mform->addElement('text', 's_1_3', $stringman->get_string('1_3', 'local_tad', null, 'hu'));
        $mform->setType('s_1_3', PARAM_NOTAGS);
        $mform->setDefault('s_1_3', '');
        $mform->addElement('html', '</td>');
        $mform->addElement('html', '<td>');
        // Angol
        $mform->addElement('text', 's_1_3_en', $stringman->get_string('1_3', 'local_tad', null, 'en'));
        $mform->setType('s_1_3_en', PARAM_NOTAGS);
        $mform->setDefault('s_1_3_en', '');
        $mform->addElement('html', '</td>');
        $mform->addElement('html', '</tr>');


        // 1.5
        $mform->addElement('html', '<tr>');
        $mform->addElement('html', '<td>');
        // Magyar
        $mform->addElement('text', 's_1_5', $stringman->get_string('1_5', 'local_tad', null, 'hu'));
        $mform->setType('s_1_5', PARAM_NOTAGS);
        $mform->setDefault('s_1_5', '');
        $mform->addElement('html', '</td>');
        $mform->addElement('html', '<td>');
        // Angol
        $mform->addElement('text', 's_1_5_en', $stringman->get_string('1_5', 'local_tad', null, 'en'));
        $mform->setType('s_1_5_en', PARAM_NOTAGS);
        $mform->setDefault('s_1_5_en', '');
        $mform->addElement('html', '</td>');
        $mform->addElement('html', '</tr>');

        // 1.6
        $mform->addElement('html', '<tr>');

        $mform->addElement('html', '</tr>');

        
        // 1.8

        $mform->addElement('html', '<tr>');
        $mform->addElement('html', '<td>');
        // Magyar
        $mform->addElement('text', 's_1_8', $stringman->get_string('1_8', 'local_tad', null, 'hu'));
        $mform->setType('s_1_8', PARAM_NOTAGS);
        $mform->setDefault('s_1_8', '');
        
        $mform->addElement('html', '</td>');
        $mform->addElement('html', '<td>');
        // Angol
        $mform->addElement('text', 's_1_8_en', $stringman->get_string('1_8', 'local_tad', null, 'en'));
        $mform->setType('s_1_8_en', PARAM_NOTAGS);
        $mform->setDefault('s_1_8_en', '');

        $mform->addElement('html', '</td>');
        $mform->addElement('html', '</tr>');

        

        


        // 1.11
        $mform->addElement('html', '<tr>');
        $mform->addElement('html', '<td>');
        // Magyar

        $mform->addElement('text', 's_1_11', $stringman->get_string('1_11', 'local_tad', null, 'hu'));
        $mform->setType('s_1_11', PARAM_NOTAGS);
        $mform->setDefault('s_1_11', '');
        $mform->addElement('html', '</td>');
        $mform->addElement('html', '<td>');
        // Angol
        $mform->addElement('text', 's_1_11_en', $stringman->get_string('1_11', 'local_tad', null, 'en'));
        $mform->setType('s_1_11_en', PARAM_NOTAGS);
        $mform->setDefault('s_1_11_en', '');

        $mform->addElement('html', '</td>');
        $mform->addElement('html', '</tr>');


        // 1.13
        $mform->addElement('html', '<tr>');
        $mform->addElement('html', '<td>');
        $mform->addElement('date_selector', 's_1_13', get_string('1_13', 'local_tad'));
        $mform->setType('s_1_13', PARAM_NOTAGS);
        $mform->setDefault('s_1_13', '');
        $mform->addElement('html', '</td>');
        // 1.14
        $mform->addElement('html', '<td>');
        $mform->addElement('checkbox', 'section1_approve_chkbx', get_string('section1_approve_label', 'local_tad'));
        $mform->addElement('html', '</td>');
        $mform->addElement('html', '</tr>');

        $mform->addElement('html', '</table>');
        
        
        // Disabling elements based on access
        
        $mform->addElement('hidden',  'editable');
        $mform->addElement('hidden', 'approvable');
        $mform->disabledIf('section1_approve_chkbx', 'approvable', 'eq','0');
        $mform->disabledIf('s_1_1',          'editable', 'eq','0');
        $mform->disabledIf('s_1_2',          'editable', 'eq','0');
        $mform->disabledIf('s_1_3',          'editable', 'eq','0');
        $mform->disabledIf('s_1_4_1',        'editable', 'eq','0');
        $mform->disabledIf('s_1_4_2',        'editable', 'eq','0');
        $mform->disabledIf('s_1_4_3',        'editable', 'eq','0');
        $mform->disabledIf('s_1_5',          'editable', 'eq','0');
        $mform->disabledIf('s_1_6',          'editable', 'eq','0');
        $mform->disabledIf('s_1_7',          'editable', 'eq','0');
        $mform->disabledIf('s_1_8',          'editable', 'eq','0');
        $mform->disabledIf('s_1_9',          'editable', 'eq','0');
        $mform->disabledIf('s_1_10',         'editable', 'eq','0');
        $mform->disabledIf('s_1_11',         'editable', 'eq','0');
        $mform->disabledIf('s_1_12_1',       'editable', 'eq','0');
        $mform->disabledIf('s_1_12_2',       'editable', 'eq','0');
        $mform->disabledIf('s_1_12_3',       'editable', 'eq','0');
        $mform->disabledIf('s_1_12_4',       'editable', 'eq','0');
        $mform->disabledIf('s_1_13',         'editable', 'eq','0');
        $mform->disabledIf('s_1_1_en',       'editable', 'eq','0');
        $mform->disabledIf('s_1_3_en',       'editable', 'eq','0');
        $mform->disabledIf('s_1_5_en',       'editable', 'eq','0');
        $mform->disabledIf('s_1_7_en',       'editable', 'eq','0');
        $mform->disabledIf('s_1_8_en',       'editable', 'eq','0');
        $mform->disabledIf('s_1_9_en',       'editable', 'eq','0');
        $mform->disabledIf('s_1_10_en',      'editable', 'eq','0');
        $mform->disabledIf('s_1_11_en',      'editable', 'eq','0');
        // Add rules

        // Required
        $mform->addRule('s_1_1', get_string('tadform_missing_field_label', 'local_tad'), 'required', null, 'server', true, false);
        $mform->addRule('s_1_1_en', get_string('tadform_missing_field_label', 'local_tad'), 'required', null, 'server', true, false);
        $mform->addRule('s_1_2', get_string('tadform_missing_field_label', 'local_tad'), 'required', null, 'server', true, false);
        $mform->addRule('s_1_3', get_string('tadform_missing_field_label', 'local_tad'), 'required', null, 'client', true, false);
        $mform->addRule('s_1_3_en', get_string('tadform_missing_field_label', 'local_tad'), 'required', null, 'client', true, false);
        $mform->addRule('s_1_4_1', get_string('tadform_missing_field_label', 'local_tad'), 'required', null, 'client', true, false);
        $mform->addRule('s_1_4_2', get_string('tadform_missing_field_label', 'local_tad'), 'required', null, 'client', true, false);
        $mform->addRule('s_1_4_3', get_string('tadform_missing_field_label', 'local_tad'), 'required', null, 'client', true, false);
        $mform->addRule('s_1_5', get_string('tadform_missing_field_label', 'local_tad'), 'required', null, 'client', true, false);
        $mform->addRule('s_1_5_en', get_string('tadform_missing_field_label', 'local_tad'), 'required', null, 'client', true, false);
        $mform->addRule('s_1_6', get_string('tadform_missing_field_label', 'local_tad'), 'required', null, 'client', true, false);
        $mform->addRule('s_1_7', get_string('tadform_missing_field_label', 'local_tad'), 'required', null, 'client', true, false);
        $mform->addRule('s_1_8', get_string('tadform_missing_field_label', 'local_tad'), 'required', null, 'client', true, false);
        $mform->addRule('s_1_8_en', get_string('tadform_missing_field_label', 'local_tad'), 'required', null, 'client', true, false);
        $mform->addRule('s_1_9', get_string('tadform_missing_field_label', 'local_tad'), 'required', null, 'client', true, false);
        $mform->addRule('s_1_10', get_string('tadform_missing_field_label', 'local_tad'), 'required', null, 'client', true, false);
        $mform->addRule('s_1_11', get_string('tadform_missing_field_label', 'local_tad'), 'required', null, 'client', true, false);
        $mform->addRule('s_1_11_en', get_string('tadform_missing_field_label', 'local_tad'), 'required', null, 'client', true, false);
        $mform->addRule('s_1_12_1', get_string('tadform_missing_field_label', 'local_tad'), 'required', null, 'client', true, false);
        $mform->addRule('s_1_12_2', get_string('tadform_missing_field_label', 'local_tad'), 'required', null, 'client', true, false);
        $mform->addRule('s_1_12_3', get_string('tadform_missing_field_label', 'local_tad'), 'required', null, 'client', true, false);
        $mform->addRule('s_1_12_4', get_string('tadform_missing_field_label', 'local_tad'), 'required', null, 'client', true, false);
        $mform->addRule('s_1_13', get_string('tadform_missing_field_label', 'local_tad'), 'required', null, 'client', true, false);

        // length
        $mform->addRule('s_1_2', get_string('tadform_invalid_code_label', 'local_tad'), 'maxlength', '11', 'client', false, false);
        $mform->addRule('s_1_2', get_string('tadform_invalid_code_label', 'local_tad'), 'minlength', '11', 'client', false, false);

        $this->add_action_buttons(); 
    }
}