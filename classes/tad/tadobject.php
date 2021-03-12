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


class TadObject {
    function __construct(
            $author, 
            $coursename, 
            $semester, 
            $entity, 
            $fullname, 
            $timecreated, 
            $filename, 
            $url, 
            $id = 0, 
            $corriculum_code, 
            $corriculum_name
        ) {
        $this->author           = $author;
        $this->coursename       = $coursename;
        $this->semester         = $semester;
        $this->entity           = $entity;
        $this->fullname         = $fullname;
        $this->timecreated      = date("Y-m-d h:i",intval($timecreated));
        $this->filename         = $filename;
        $this->url              = $url;
        $this->id               = $id;
        $this->corriculum_code  = $corriculum_code;
        $this->corriculum_name  = $corriculum_name;
    }
    public function get_as_templatecontext(){
        return array(
            'coursename'            => $this->coursename, 
            'semester'              => $this->semester, 
            'fullname'              => $this->fullname,   
            'entity'                => $this->entity,     
            'timecreated'           => $this->timecreated,
            'filename'              => $this->filename,   
            'url'                   => $this->url,
            'id'                    => $this->id,    
            'corriculum_code'       => $this->corriculum_code,    
            'corriculum_name'       => $this->corriculum_name,    
        );
    }
    public function save_to_db(){                                                                                                
        global $DB;
        $dbobj = new stdClass();
        $dbobj->id             = $this->id;
        $dbobj->name           = $this->fullname;
        $dbobj->author         = $this->author;
        $dbobj->editable       = false;
        $dbobj->coursecode     = $this->coursename;
        $dbobj->dlurl          = $this->url->out(false);
        $dbobj->semester       = $this->semester;
        $dbobj->timecreated    = $this->timecreated;
        $dbobj->timerelevant   = $this->timecreated;
        $dbobj->version        = 1;

        if(!$DB->insert_record('tad', $dbobj)){
            return false;
        }
        echo $dbobj->name . " added to db" . "<br>";
        return true;
    }
}