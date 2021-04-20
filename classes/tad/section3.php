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
 * @package     local_tad
 * @copyright   2020, You Name <your@email.address>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * 
 */

class tadSection3{
    function __construct($formdata, $userid, $parent) {
        $this->data = $formdata;
        unset($this->data->submitbutton);
        $this->data->topics_summary     = strval($formdata->topics_summary);
        $this->data->topics             = strval($formdata->topics);
        $this->data->lecturers          = strval($formdata->lecturers);
        $this->data->workhours_activity = strval($formdata->workhours_activity);
        $this->data->validity_3    = strval($formdata->validity_3);
        $this->data->validity_en_3 = strval($formdata->validity_en_3);
        $this->data->validby_3     = strtotime($formdata->validby_3);
        $this->data->validuntil_3  = strtotime($formdata->validuntil_3);
        $this->data->parent       = intval($parent);
        $this->data->locked       = intval(0);
        $this->data->draft        = intval(1);
        $this->data->published    = intval(0);
        $this->data->created_by   = intval($userid);
        $this->data->version      = intval(1);
    }
    function get_all(){
        return $this->data;
    }
    function as_array(){
        return (array) $this->data;
    }
    function dump(){
        $v = (array) $this->data;
        var_dump($v);
        die;
    }
    function insert_to_db(){
        global $DB;
        $recordid = $DB->insert_record('tad_section3', $this->as_array());
        return $recordid;
    }
}