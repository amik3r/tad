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

function get_all_courses(){
    global $DB;
    $missing = 0;
    $ok = 0;
    $courses = $DB->get_records_sql("SELECT coursecode from {tad_corriculum} WHERE coursecode LIKE '%BMEGT70%'", array());
    foreach ($courses as $course) {
        if (!$DB->get_record('tad', array('coursecode' => $course->coursecode))){
            echo 'missing: ' . $course->coursecode . "\n";
            $missing += 1;
        } else {
            echo 'OK: ' . $course->coursecode . "\n";
            $ok += 1;
        }
    }
    echo "all: " . count($courses) . "\n";
    echo "OK: " . $ok . "\n";
    echo "Missing: " . $missing . "\n";
}
get_all_courses();