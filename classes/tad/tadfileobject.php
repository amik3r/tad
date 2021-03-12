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
 * @property    array $r singular value from get_records_sql()
 * @method      array __consturct __construct($r)
 * 
 */

class TadFileObject {
    function __construct($r) {
        $this->filename = $r->filename;
        $this->author = $r->author;
        $this->timecreated = $r->timecreated;
        $this->itemid = $r->itemid;
        $this->contextid = $r->contextid;
        $this->component = $r->component;
        $this->filearea = $r->filearea;
        $this->filepath = $r->filepath;
        $x = explode("_", $this->filename);
        $this->coursecode = explode('.',$x[1])[0];
        $this->create_download_url();       
    }
    public function create_download_url(){
        global $DB;
        if(!$filerecord = $DB->get_record('files', ["component" => 'local_tad', 'filename' => $this->filename])){
            return false;
        };
        $this->dllink = moodle_url::make_pluginfile_url(
            $filerecord->contextid,
            $filerecord->component,
            $filerecord->filearea,
            $filerecord->itemid, 
            $filerecord->filepath, 
            $filerecord->filename, 
            true
        );
        return true;
    }
}