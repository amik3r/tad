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
use tool_customlang\local\mlang\langstring;

//moodleform is defined in formslib.php
require_once("$CFG->libdir/formslib.php");
class langselect extends moodleform {
    public function definition() {
        $mform = $this->_form;

        $options = array(
            'Magyar' => 'hu',
            'English' => 'en'
        );
        $select = $mform->addElement('select', 'language', '', $options);
        // This will select the colour blue.
        $select->setSelected('Magyar');
        $mform->setDefault('language','Magyar');
        $this->add_action_buttons($cancel = false, $submitlabel=get_string('filterlabel', 'local_tad'));
    }
}