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

use mod_data\event\record_created;

require_once (__DIR__ . '/section1.php');
require_once (__DIR__ . '/section2.php');
require_once (__DIR__ . '/section3.php');
class tadAllSections{
    function __construct($formdata, $userid) {
        $this->userid = $userid;
        $this->data = $formdata;
        $this->section1Obj = new tadSection1($formdata, $this->userid);
    }

    function record_data($userid){
        global $DB;
        $parentid = $DB->insert_record('tad_section_one', $this->section1Obj->as_array());
        $this->section2Obj = new tadSection2($this->data, $userid, $parentid);
        $this->section3Obj = new tadSection3($this->data, $userid, $parentid);
        $this->section2Obj->insert_to_db();
        $this->section3Obj->insert_to_db();
    }

    function build_subsections($id){
        $this->section2Obj = new tadSection2($this->data, $id, $id);
        $this->section3Obj = new tadSection3($this->data, $id, $id);
    }

    function get_section1(){
        return $this->section1Obj;
    }
    function get_section2(){
        return $this->section2Obj;
    }
    function get_section3(){
        return $this->section3Obj;
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
}