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

class tadSection2{
    function __construct($formdata, $userid, $parent) {
        $this->data->rules =                    $formdata->rules;
        $this->data->rules_en =                 $formdata->rules_en;
        $this->data->assesment_methods_hu =     $formdata->assesment_methods_hu;                   
        $this->data->assesment_methods_en =     $formdata->assesment_methods_en;
        $this->data->midterm_proportions =      $formdata->midterm_proportions;
        $this->data->exam_proportions =         $formdata->exam_proportions;
        
        $this->data->excellent =                intval($formdata->excellent);
        $this->data->very_good =                intval($formdata->very_good);
        $this->data->good =                     intval($formdata->good);
        $this->data->satisfactory =             intval($formdata->satisfactory);
        $this->data->pass =                     intval($formdata->pass);
        $this->data->fail =                     intval($formdata->fail);

        $this->data->retake =                   $formdata->retake;
        $this->data->retake_en =                $formdata->retake_en;
        $this->data->signature =                $formdata->signature;
        $this->data->signature_en =             $formdata->signature_en;
        $this->data->workhours_activity =       $formdata->workhours_activity;

        $this->data->validity =                 $formdata->validity_2;
        $this->data->validity_en =              $formdata->validity_en_2;
        $this->data->validby =                  $formdata->validby_2;
        $this->data->validuntil =               $formdata->validuntil_2;

        $this->data->parent =                   $parent;
        $this->data->locked =                   intval(0);
        $this->data->draft =                    intval(1);
        $this->data->published =                intval(0);
        $this->data->created_by =               $userid;
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
        $recordid = $DB->insert_record('tad_section2', $this->as_array());
        return $recordid;
    }
}