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
require_once($CFG->dirroot . '/local/tad/classes/tad/departmentobject.php');

$ent = new Department();

//echo "Case 1: eng->hun --- hun->eng \n";
//echo "------------------------------------\n";
//
//$hun = $ent->get_hungarian('Üzleti Jog Tanszék');
//$eng = $ent->get_english('Üzleti Jog Tanszék');
//echo "\n hung: " . $hun . "\n eng: " . $eng . "\n\n";
//
//
//echo "Case 2: hun->hun --- eng->eng \n";
//echo "------------------------------------\n";
//
//$hun = $ent->get_hungarian('Ergonómia és Pszichológia Tanszék');
//$eng = $ent->get_english('Department of Ergonomics and Psychology');
//echo "\n hung: " . $hun . "\n eng: " . $eng . "\n\n";

//echo $ent->get_department_by_code("gt20") . '---' . "gt20" . "\n";
//echo $ent->get_department_by_code("GT30") . '---' . "GT30" . "\n";
//echo $ent->get_department_by_code("GT35") . '---' . "GT35" . "\n";
//echo $ent->get_department_by_code("gt41") . '---' . "gt41" . "\n";
//echo $ent->get_department_by_code("GT42") . '---' . "GT42" . "\n";
//echo $ent->get_department_by_code("GT43") . '---' . "GT43" . "\n";
//echo $ent->get_department_by_code("GT51") . '---' . "GT51" . "\n";
//echo $ent->get_department_by_code("GT52") . '---' . "GT52" . "\n";
//echo $ent->get_department_by_code("GT55") . '---' . "GT55" . "\n";
//echo $ent->get_department_by_code("GT70") . '---' . "GT70" . "\n";
//
//echo $ent->get_hungarian($ent->get_department_by_code("gt20")) . "\n";
//echo $ent->get_hungarian($ent->get_department_by_code("GT30")) . "\n";
//echo $ent->get_hungarian($ent->get_department_by_code("GT35")) . "\n";
//echo $ent->get_hungarian($ent->get_department_by_code("gt41")) . "\n";
//echo $ent->get_hungarian($ent->get_department_by_code("GT42")) . "\n";
echo $ent->get_hungarian($ent->get_department_by_code(substr("BMEGT43A020", 3, 4))) . "\n";
echo $ent->get_english($ent->get_department_by_code(substr("BMEGT43A020", 3, 4))) . "\n";
//echo $ent->get_hungarian($ent->get_department_by_code("GT51")) . "\n";
//echo $ent->get_hungarian($ent->get_department_by_code("GT52")) . "\n";
//echo $ent->get_hungarian($ent->get_department_by_code("GT55")) . "\n";
//echo $ent->get_hungarian($ent->get_department_by_code("GT70")) . "\n";

echo substr("BMEGT43A020", 3, 4) . "\n";