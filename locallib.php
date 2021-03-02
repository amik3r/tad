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

use function PHPSTORM_META\type;

global $PAGE;
require_once(__DIR__ . '../../../config.php');

$types = array(
    "word"  =>  "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
    "pdf"   =>  "application/pdf"
);

function get_all_tad_files($filetype="word"){
    global $types;
    global $DB;

    $type = $types[$filetype];

    $filesql = "
        SELECT * FROM {files}
        WHERE filename 
            LIKE :filepattern 
        AND component = :filearea
        AND mimetype = :filetype
    ";
    $rows = $DB->get_records_sql($filesql, ['filepattern' => "TAD%", 'filearea' => 'local_tad', 'filetype' => $type]);
    return $rows;
}