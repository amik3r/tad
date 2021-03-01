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
global $PAGE;
require_once(__DIR__ . '../../../config.php');

function tad_pluginfile($filename, $context, array $options=array()){
    global $DB;

    $filedata = $DB->get_record('files', ['filename' => $filename]);

    if (!$filedata) {
        return $filedata;
    }

    $fs = get_file_storage();
    $file = $fs->get_file($context->id, 'local_tad', 'attachment', $filedata->id, $filedata->filepath, $filedata->filename);
    if (!$file) {
        return $filedata; // The file does not exist.
    }
    // We can now send the file back to the browser - in this case with a cache lifetime of 1 day and no filtering. 
    send_stored_file($file, 86400, 0, false, $options);
}
