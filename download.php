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
global $DB;


require_once(__DIR__ . '/lib.php');
require_once(__DIR__ . '/../../config.php');
require_login();

$PAGE->set_context(\context_system::instance());
$PAGE->set_url(new moodle_url('/local/tad/download.php'));
$PAGE->set_title('files');
$PAGE->set_heading('files');

$url = $PAGE->url;
$requestedfilename = $url->get_param('fn');

$a = tad_pluginfile($requestedfilename, $PAGE->context);
//redirect($CFG->wwwroot . '/local/tad/view.php', 'Banner submission cancelled');

echo $OUTPUT->header();
var_dump($a);
