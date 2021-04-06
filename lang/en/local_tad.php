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
 *  * Strings for component 'tad', language 'en'

 * @package   local_tad
 * @copyright 2021, Antal Miklós <antal.miklos@gtk.bme.hu>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'TAD portal';

$string['csv_tad_upload_label'] = 'csv_tad_upload_label';


// Settings page labels
$string['settings_pluginname'] = 'TAD';
$string['settings_semester_label'] = 'Félév';
$string['settings_semester_desc'] = 'Aktuális félév';

// Page titles
$string['manager'] = 'Manage all aspects of TAD process';
$string['approver'] = 'Approve TADs';
$string['editor'] = 'Edit TADs';
$string['reviewer'] = 'Review TADs';
$string['upload_corriculumlabel'] = 'Upload corriculums';

// Form strings 
$string['uploadlabel'] = 'Upload TADs';
$string['csv_upload_label'] = 'Upload Corriculums';
$string['csv_separator_label'] = 'Separator';
$string['csv_parse_error'] = 'Failed to read csv file';


// Notifications
$string['upload_cancelled'] = 'Upload Cancelled';
$string['upload_successful'] = 'Upload successful';
$string['upload_failed'] = 'Upload failed';

// view labels
$string['semester_label'] = 'Félév';
$string['search_label'] = 'Keresés';
$string['semester_select_default'] = 'All';

// Table headings in view.php
$string['author_heading']               = 'Author';
$string['course_code_heading']          = 'Course Code';
$string['course_name_heading']          = 'Course Name';
$string['department_heading']           = 'Department';
$string['time_created_heading']         = 'Time Created';
$string['file_heading']                 = 'Download';
$string['id_heading']                   = 'ID';
$string['semester_heading']             = 'Semester';
$string['corriculum_code_heading']      = 'Programme Code';
$string['corriculum_name_heading']      = 'Programme name';
$string['lang_heading']                 = 'Language';

$string['upload_in_progress'] = 'Upload in progress';
$string['tad_not_available'] = 'Not available';

// Misc HTML content
$string['label_noresult'] = 'No results!';
$string['semester_select_label'] = 'Semester';
$string['filterlabel'] = 'Filter';
$string['corr_default_label'] = 'Programmes, which the course is part of';

$string['tad_announcement'] = 'Early version of the TAD Portal, which contains Course Data Forms from the 2020/2021/2 semester.';

// TAD EDITOR
// Section 1
$string['1_1'] = 'Course name';
$string['1_2'] = 'Course code';
$string['1_3'] = 'Course type';
$string['1_4'] = 'Kurzustípusok és óraszámok';
$string['1_4_1'] = 'Lecture';
$string['1_4_2'] = 'Practice';
$string['1_4_3'] = 'Laboratory';
$string['1_5'] = 'Type of assessment';
$string['1_6'] = 'Number of credits';
$string['1_7'] = 'Course leader';
$string['1_8'] = 'Organizational unit for the subject';
$string['1_9'] = 'Subject website';
$string['1_10'] = 'Language of teaching';
$string['1_11'] = 'Curriculum role of the subject, recommended semester';
$string['1_12'] = 'Pre-requisites';
$string['1_12_1'] = 'strong';
$string['1_12_2'] = 'weak';
$string['1_12_3'] = 'paralell';
$string['1_12_4'] = 'exclusive';
$string['1_13'] = 'A tantárgyleírás érvényessége';

$string['section1_approve_label'] = '1. rész jóváhagyása';
$string['tadform_missing_field_label'] = 'Kötelező megadni';
$string['tadform_invalid_code_label'] = 'Helytelen adat';