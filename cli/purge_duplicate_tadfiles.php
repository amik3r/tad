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
 * @copyright 2021, Antal Miklós <antal.miklos@gtk.bme.hu>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
define('CLI_SCRIPT', true);
require_once(__DIR__    . '/../../../config.php');

function delete_files(){
    global $DB;
    
    $filenames = array();
    $i = 0;
    $fs = get_file_storage();
    $files = $DB->get_recordset('files', ["component" => "local_tad", "filearea" => "attachment"]);
    foreach ($files as $f) {
        $i++;
        if (!in_array($f->filename, $filenames)){
            array_push($filenames, $f->filename);
        } else {
            echo "duplicate found \n";
            try{
                $file = $fs->get_file($f->contextid, $f->component, $f->filearea, $f->itemid, $f->filepath, $f->filename);
                $file->delete();
                echo $f->filename . " deleted\n";
            } catch (Throwable $th){
                echo $th . "\n";
            }
        }
    }
}

function delete_db_etries(){
    global $DB;
    $prevarray = array();
    $recordstodelete = [];
    $tadsindb = $DB->get_records('tad');

    foreach ($tadsindb as $t) {
        if(empty($prevarray)){
            echo "empty\n";
            array_push($t, $prevarray);
        }
        foreach ($prevarray as $prev) {
            echo $t->id;
            if (!empty($prevarray) && strcmp($t->coursecode, $prev->coursecode)==0){
                $recordstodelete[] = $t->id;
            } else {
                array_push($t, $prevarray);
            }
        }
    }
    var_dump($prevarray) . "\n";
    var_dump($recordstodelete);
}

delete_db_etries();
//echo "Files previously on server: " . $i . "\n";
//echo "Files after the purge: " . count($filenames) . "\n";
