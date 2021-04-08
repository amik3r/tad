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

class tadSection1{
    function __construct($formdata, $userid) {
        $this->coursename               = $formdata->s_1_1;
        $this->coursename_en            = $formdata->s_1_1_en;
        $this->coursecode               = $formdata->s_1_2;
        $this->coursetype               = $formdata->s_1_3;
        $this->coursetype_en            = $formdata->s_1_3_en;
        $this->lecture                  = $formdata->s_1_4_1;
        $this->practice                 = $formdata->s_1_4_2;
        $this->laboratory               = $formdata->s_1_4_3;
        $this->assesmenttype            = $formdata->s_1_5;
        $this->assesmenttype_en         = $formdata->s_1_5_en;
        $this->credit                   = intval($formdata->s_1_6);
        $this->courseleadername         = $formdata->s_1_7_1;
        $this->courseleaderrank         = $formdata->s_1_7_2_1;
        $this->courseleaderrank_en      = $formdata->s_1_7_2_2;
        $this->courseleadercontact      = $formdata->s_1_7_3;
        $this->ou                       = $formdata->s_1_8;
        $this->ou_en                    = $formdata->s_1_8_en;
        $this->website                  = $formdata->s_1_9;
        $this->lang                     = $formdata->s_1_10;
        $this->corriculumrole           = $formdata->s_1_11;
        $this->corriculumrole_en        = $formdata->s_1_11_en;
        $this->strong                   = $formdata->s_1_12_1;
        $this->weak                     = $formdata->s_1_12_2;
        $this->paralell                 = $formdata->s_1_12_3;
        $this->exclusive                = $formdata->s_1_12_4;
        $this->validity                 = $formdata->s_1_13;
        $this->validity_en              = $formdata->s_1_13_en;
        $this->validby                  = strtotime($formdata->s_1_13_1);
        $this->validuntil               = strtotime($formdata->s_1_13_2);

        $this->parent           = 0;
        $this->locked           = 0;
        $this->draft            = 1;
        $this->published        = 0;
        $this->created_by       = intval($userid);
        $this->version          = 1;
    }
    function get_all(){
        return $this;
    }
    function as_array(){
        return (array) $this;
    }
    function dump(){
        $v = (array) $this;
        var_dump($v);
        die;
    }
}