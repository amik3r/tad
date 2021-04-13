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

class tadSectionAll extends moodleform {
    public $readonly;
    public $approveable;
    public function definition() {
        $mform = $this->_form;
        $stringman = get_string_manager();
        $mform->addElement('hidden', 'coursecode');
        $mform->setType('coursecode', PARAM_NOTAGS);
        $mform->setDefault('coursecode', '');
        $mform->addElement('hidden', 'credit');
        $mform->setType('credit', PARAM_NOTAGS);
        $mform->setDefault('credit', '');
        $mform->addElement('hidden', 'courseleadername');
        $mform->setType('courseleadername', PARAM_NOTAGS);
        $mform->setDefault('courseleadername', '');
        $mform->addElement('hidden', 'courseleaderrank');
        $mform->setType('courseleaderrank', PARAM_NOTAGS);
        $mform->setDefault('courseleaderrank', '');
        $mform->addElement('hidden', 'courseleaderrank_en');
        $mform->setType('courseleaderrank_en', PARAM_NOTAGS);
        $mform->setDefault('courseleaderrank_en', '');
        $mform->addElement('hidden', 'courseleadercontact');
        $mform->setType('courseleadercontact', PARAM_NOTAGS);
        $mform->setDefault('courseleadercontact', '');
        $mform->addElement('hidden', 'website');
        $mform->setType('website', PARAM_NOTAGS);
        $mform->setDefault('website', '');
        $mform->addElement('hidden', 'lang');
        $mform->setType('lang', PARAM_NOTAGS);
        $mform->setDefault('lang', '');
        $mform->addElement('hidden', 'strong');
        $mform->setType('strong', PARAM_NOTAGS);
        $mform->setDefault('strong', '');
        $mform->addElement('hidden', 'weak');
        $mform->setType('weak', PARAM_NOTAGS);
        $mform->setDefault('weak', '');
        $mform->addElement('hidden', 'paralell');
        $mform->setType('paralell', PARAM_NOTAGS);
        $mform->setDefault('paralell', '');
        $mform->addElement('hidden', 'exclusive');
        $mform->setType('exclusive', PARAM_NOTAGS);
        $mform->setDefault('exclusive', '');
        $mform->addElement('hidden', 'lecture');
        $mform->setType('s_1_4_1', PARAM_NOTAGS);
        $mform->setDefault('s_1_4_1', '');
        $mform->addElement('hidden', 'practice');
        $mform->setType('s_1_4_2', PARAM_NOTAGS);
        $mform->setDefault('s_1_4_2', '');
        $mform->addElement('hidden', 'laboratory');
        $mform->setType('s_1_4_3', PARAM_NOTAGS);
        $mform->setDefault('s_1_4_3', '');
        $mform->addElement('hidden', 'coursename');
        $mform->setType('coursename', PARAM_NOTAGS);
        $mform->setDefault('coursename', '');
        $mform->addElement('hidden', 'coursename_en');
        $mform->setType('coursename_en', PARAM_NOTAGS);
        $mform->setDefault('coursename_en', '');
        $mform->addElement('hidden', 'coursetype');
        $mform->setType('coursetype', PARAM_NOTAGS);
        $mform->setDefault('coursetype', '');
        $mform->addElement('hidden', 'coursetype_en');
        $mform->setType('coursetype_en', PARAM_NOTAGS);
        $mform->setDefault('coursetype_en', '');
        $mform->addElement('hidden', 'assesmenttype');
        $mform->setType('assesmenttype', PARAM_NOTAGS);
        $mform->setDefault('assesmenttype', '');
        $mform->addElement('hidden', 'assesmenttype_en');
        $mform->setType('assesmenttype_en', PARAM_NOTAGS);
        $mform->setDefault('assesmenttype_en', '');
        $mform->addElement('hidden', 'ou');
        $mform->setType('ou', PARAM_NOTAGS);
        $mform->setDefault('ou', '');
        $mform->addElement('hidden', 'ou_en');
        $mform->setType('ou_en', PARAM_NOTAGS);
        $mform->setDefault('ou_en', '');
        $mform->addElement('hidden', 'corriculumrole');
        $mform->setType('corriculumrole', PARAM_NOTAGS);
        $mform->setDefault('corriculumrole', '');
        $mform->addElement('hidden', 'corriculumrole_en');
        $mform->setType('corriculumrole_en', PARAM_NOTAGS);
        $mform->setDefault('corriculumrole_en', '');
        $mform->addElement('hidden', 'validity');
        $mform->setType('validity', PARAM_NOTAGS);
        $mform->setDefault('validity', '');
        $mform->addElement('hidden', 'validity_en');
        $mform->setType('validity_en', PARAM_NOTAGS);
        $mform->setDefault('validity_en', '');
        $mform->addElement('hidden', 'validby');
        $mform->setType('validby', PARAM_NOTAGS);
        $mform->setDefault('validby', '');
        $mform->addElement('hidden', 'validuntil');
        $mform->setType('validuntil', PARAM_NOTAGS);
        $mform->setDefault('validuntil', '');

        $mform->addElement('hidden', 'objectives');
        $mform->setType('objectives', PARAM_NOTAGS);
        $mform->setDefault('objectives', '');
        $mform->addElement('hidden', 'objectives_en');
        $mform->setType('objectives_en', PARAM_NOTAGS);
        $mform->setDefault('objectives_en', '');

        // 2.2.1
        $mform->addElement('hidden', 'outcomes_value_1');
        $mform->setType('outcomes_value_1', PARAM_NOTAGS);
        $mform->setDefault('outcomes_value_1', '');
        
        // 2.2.2
        $mform->addElement('hidden', 'outcomes_value_2');
        $mform->setType('outcomes_value_2', PARAM_NOTAGS);
        $mform->setDefault('outcomes_value_2', '');
        // 2.2.3
        $mform->addElement('hidden', 'outcomes_value_3');
        $mform->setType('outcomes_value_3', PARAM_NOTAGS);
        $mform->setDefault('outcomes_value_3', '');
        // 2.2.4
        $mform->addElement('hidden', 'outcomes_value_4');
        $mform->setType('outcomes_value_4', PARAM_NOTAGS);
        $mform->setDefault('outcomes_value_4', '');

        $mform->addElement('hidden', 'methodology');
        $mform->setType('methodology', PARAM_NOTAGS);
        $mform->setDefault('methodology', '');
        $mform->addElement('hidden', 'methodology_en');
        $mform->setType('methodology_en', PARAM_NOTAGS);
        $mform->setDefault('methodology_en', '');

        $mform->addElement('hidden', 'supportmaterial');
        $mform->setType('supportmaterial', PARAM_NOTAGS);
        $mform->setDefault('supportmaterial', '');
        // Disabling elements based on access
        

        /// II. rész



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
        //$required_data = $mform->getElement('required');
        $readonly = $readonly_data->_attributes['value'];
        $templatestuff = ['readonly' => $readonly];
        $mform->addElement(
            'html', 
            $OUTPUT->render_from_template('local_tad/tadall', $templatestuff)
        );
        if ($readonly !== 'disabled'){
            $this->add_action_buttons(); 
        }
    }
}