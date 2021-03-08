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
        if($file = $fs->get_file($f->contextid, $f->component, $f->filearead, $f->itemid, $f->filepath, $f->filename)){
            $file->delete();
            echo $f->filename . " deleted\n";
        }
        var_dump($f);
        die;
    }
}

echo "Files previously on server: " . $i . "\n";
echo "Files after the purge: " . count($filenames) . "\n";