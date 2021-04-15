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
        $this->data = $formdata;
        $this->data->coursename =               $this->formdata->coursename;
        $this->data->coursename_en =            $this->formdata->coursename_en;
        $this->data->coursecode =               $this->formdata->coursecode;                   
        $this->data->coursetype =               $this->formdata->coursetype;
        $this->data->coursetype_en =            $this->formdata->coursetype_en;
        $this->data->lecture =                  intval($this->formdata->lecture);
        $this->data->practice =                 intval($this->formdata->practice);
        $this->data->laboratory =               intval($this->formdata->laboratory);
        $this->data->assesmenttype =            $this->formdata->assesmenttype;
        $this->data->assesmenttype_en =         $this->formdata->assesmenttype_en;
        $this->data->credit =                   intval($this->formdata->credit);
        $this->data->courseleadername =         $this->formdata->courseleadername;
        $this->data->courseleaderrank =         $this->formdata->courseleaderrank;
        $this->data->courseleaderrank_en =      $this->formdata->courseleaderrank_en;
        $this->data->courseleadercontact =      $this->formdata->courseleadercontact;
        $this->data->ou =                       $this->formdata->ou;
        $this->data->ou_en =                    $this->formdata->ou_en;
        $this->data->website =                  $this->formdata->website;
        $this->data->lang =                     $this->formdata->lang;
        $this->data->corriculumrole =           $this->formdata->corriculumrole;
        $this->data->corriculumrole_en =        $this->formdata->corriculumrole_en;
        $this->data->strong =                   $this->formdata->strong;
        $this->data->weak =                     $this->formdata->weak;
        $this->data->paralell =                 $this->formdata->paralell;
        $this->data->exclusive =                $this->formdata->exclusive;
        $this->data->objectives =               $this->formdata->objectives;
        $this->data->objectives_en =            $this->formdata->objectives_en;
        $this->data->outcome_1 =                $this->formdata->outcome_1;
        $this->data->outcome_2 =                $this->formdata->outcome_2;
        $this->data->outcome_3 =                $this->formdata->outcome_3;
        $this->data->outcome_4 =                $this->formdata->outcome_4;
        $this->data->methodology =              $this->formdata->methodology;
        $this->data->methodology_en =           $this->formdata->methodology_en;
        $this->data->supportmaterial =          $this->formdata->supportmaterial;

        $this->data->validity =                 $this->formdata->validity;
        $this->data->validity_en =              $this->formdata->validity_en;
        $this->data->validby =                  intval($this->formdata->validby);
        $this->data->validuntil =               intval($this->formdata->validuntil);
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
}