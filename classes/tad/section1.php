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
        unset($this->data->submitbutton);
        $this->data->credit = intval($this->data->credit);
        $this->data->validby      = strtotime($this->data->validby);
        $this->data->validuntil   = strtotime($this->data->validuntil);
        $this->data->parent       = intval(0);
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
}