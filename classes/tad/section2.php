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
        $this->data->rules =                    $this->formdata->rules;
        $this->data->rules_en =                 $this->formdata->rules_en;
        $this->data->assesment_methods_hu =     $this->formdata->assesment_methods_hu;                   
        $this->data->assesment_methods_en =     $this->formdata->assesment_methods_en;
        $this->data->midterm_proportions =      $this->formdata->midterm_proportions;
        $this->data->exam_proportions =         $this->formdata->exam_proportions;
        
        $this->data->excellent =                intval($this->formdata->excellent);
        $this->data->very_good =                intval($this->formdata->very_good);
        $this->data->good =                     intval($this->formdata->good);
        $this->data->satisfactory =             intval($this->formdata->satisfactory);
        $this->data->pass =                     intval($this->formdata->pass);
        $this->data->fail =                     intval($this->formdata->fail);

        $this->data->retake =                   $this->formdata->retake;
        $this->data->retake_en =                $this->formdata->retake_en;
        $this->data->signature =                $this->formdata->signature;
        $this->data->workhours_activity =       $this->formdata->workhours_activity;
        $this->data->validity =                 $this->formdata->validity_2;
        $this->data->validity_en =              $this->formdata->validity_en_2;
        $this->data->validby =                  intval($this->formdata->validby_2);
        $this->data->validuntil =               intval($this->formdata->validuntil_2);

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