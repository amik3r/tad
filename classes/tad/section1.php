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
        $this->data = new stdClass();
        var_dump($formdata);
        $this->data = $formdata;
        $this->data->coursename =               $formdata->coursename;
        $this->data->coursename_en =            $formdata->coursename_en;
        $this->data->coursecode =               $formdata->coursecode;                   
        $this->data->coursetype =               $formdata->coursetype;
        $this->data->coursetype_en =            $formdata->coursetype_en;
        $this->data->lecture =                  intval($formdata->lecture);
        $this->data->practice =                 intval($formdata->practice);
        $this->data->laboratory =               intval($formdata->laboratory);
        $this->data->assesmenttype =            $formdata->assesmenttype;
        $this->data->assesmenttype_en =         $formdata->assesmenttype_en;
        $this->data->credit =                   intval($formdata->credit);
        $this->data->courseleadername =         $formdata->courseleadername;
        $this->data->courseleaderrank =         $formdata->courseleaderrank;
        $this->data->courseleaderrank_en =      $formdata->courseleaderrank_en;
        $this->data->courseleadercontact =      $formdata->courseleadercontact;
        $this->data->ou =                       $formdata->ou;
        $this->data->ou_en =                    $formdata->ou_en;
        $this->data->website =                  $formdata->website;
        $this->data->lang =                     $formdata->lang;
        $this->data->corriculumrole =           $formdata->corriculumrole;
        $this->data->corriculumrole_en =        $formdata->corriculumrole_en;
        $this->data->strong =                   $formdata->strong;
        $this->data->weak =                     $formdata->weak;
        $this->data->paralell =                 $formdata->paralell;
        $this->data->exclusive_1 =              $formdata->exclusive;
        $this->data->objectives =               $formdata->objectives;
        $this->data->objectives_en =            $formdata->objectives_en;
        $this->data->outcome_1 =                $formdata->outcomes_value_4;
        $this->data->outcome_2 =                $formdata->outcomes_value_4;
        $this->data->outcome_3 =                $formdata->outcomes_value_4;
        $this->data->outcome_4 =                $formdata->outcomes_value_4;
        $this->data->methodology =              $formdata->methodology;
        $this->data->methodology_en =           $formdata->methodology_en;
        $this->data->supportmaterial =          $formdata->supportmaterial;

        $this->data->validity =                 $formdata->validity;
        $this->data->validity_en =              $formdata->validity_en;
        $this->data->validby =                  $formdata->validby;
        $this->data->validuntil =               $formdata->validuntil;
        $this->data->locked                   = intval(0);
        $this->data->draft                    = intval(1);
        $this->data->published                = intval(0);
        $this->data->created_by               = $userid;
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
        $parentid = $DB->insert_record('tad_section_one', $this->as_array());
        return $parentid;
    }
}