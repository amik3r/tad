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


abstract class tadSection1 {
    public $coursename;          
    public $coursename_en;
    public $coursecode;
    public $coursetype;
    public $coursetype_en;
    public $lecture;
    public $practice;
    public $laboratory;
    public $assesmenttype;
    public $assesmenttype_en;
    public $credits;
    public $courseleadername;
    public $courseleaderrank;
    public $courseleaderrank_en;
    public $courseleadercontact;
    public $ou;
    public $ou_en;
    public $website;
    public $lang;
    public $corriculumrole;
    public $corriculumrole_en;
    public $strong;
    public $weak;
    public $paralell;
    public $exclusive;
    public $validuntil;

    public function set_parent(){
        return;
    }
    public function set_locked(){
        return;
    }
    public function set_draft(){
        return;
    }
    public function set_published(){
        return;
    }
    public function set_created_by(){
        return;
    }
    protected function instert_to_db(){
        return;
    }
}

class tadFromForm extends tadSection1 {
    function __construct($formdata){
        $this->coursename           = $formdata->s_1_1;
        $this->coursename_en        = $formdata->s_1_1_en;
        $this->coursecode           = $formdata->s_1_2;
        $this->coursetype           = $formdata->s_1_3;
        $this->coursetype_en        = $formdata->s_1_3_en;
        $this->lecture              = $formdata->s_1_4_1;
        $this->practice             = $formdata->s_1_4_2;
        $this->laboratory           = $formdata->s_1_4_3;
        $this->assesmenttype        = $formdata->s_1_5;
        $this->assesmenttype_en     = $formdata->s_1_5_en;
        $this->credits              = $formdata->s_1_6;
        $this->courseleadername     = $formdata->s_1_7_1;
        $this->courseleaderrank     = $formdata->s_1_7_2_1;
        $this->courseleaderrank_en  = $formdata->s_1_7_2_2;
        $this->courseleadercontact  = $formdata->s_1_7_3;
        $this->ou                   = $formdata->s_1_8;
        $this->ou_en                = $formdata->s_1_8_en;
        $this->website              = $formdata->s_1_9;
        $this->lang                 = $formdata->s_1_10;
        $this->corriculumrole       = $formdata->s_1_11;
        $this->corriculumrole_en    = $formdata->s_1_11_en;
        $this->strong               = $formdata->s_1_12_1;
        $this->weak                 = $formdata->s_1_12_2;
        $this->paralell             = $formdata->s_1_12_3;
        $this->exclusive            = $formdata->s_1_12_4;
        $this->validuntil           = $formdata->s_1_13;
        $this->set_parent();
        $this->instert_to_db();
    }
}