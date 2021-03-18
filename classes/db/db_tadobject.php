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


class DBTadObject {
    function __construct(
            $name, 
            $author, 
            $editable = 0,
            $coursecode, 
            $dlurl,
            $semester,
            $timerelevant,
            $timecreated
        ) {
        $this->name             = $name;
        $this->author           = $author;
        $this->editable         = $editable;
        $this->coursecode       = $coursecode;
        $this->dlurl            = $dlurl;
        $this->semester         = $semester;
        $this->timerelevant     = $timerelevant;
        $this->timecreated      = $timecreated;
    }

    public function save_to_db(){                                                                                                
        global $DB;
        $dbobj = new stdClass();
        $dbobj->author           = $this->author;
        $dbobj->name             = $this->name;
        $dbobj->editable         = $this->editable;
        $dbobj->coursecode       = $this->coursecode;
        $dbobj->dlurl            = $this->dlurl->out();
        $dbobj->semester         = $this->semester;
        $dbobj->timerelevant     = $this->timerelevant;
        $dbobj->timecreated      = $this->timecreated;
        $dbobj->version          = 1;

        if(!$DB->insert_record('tad', $dbobj)){
            return false;
        }
        echo $dbobj->name . " added to db" . "<br>";
        return true;
    }
}