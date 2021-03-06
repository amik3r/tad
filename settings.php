<?php
// This file is part of Moodle - https://moodle.org/
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
 * Adds admin settings for the plugin.
 *
 * @package     local_helloworld
 * @category    admin
 * @copyright   2020 Your Name <email@example.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
 
defined('MOODLE_INTERNAL') || die();
 
if ($hassiteconfig) {
    $ADMIN->add('localplugins', new admin_category('local_tad_settings', get_string('settings_pluginname', 'local_tad')));
    $settingspage = new admin_settingpage('local_tad', get_string('settings_pluginname', 'local_tad'));
 
    if ($ADMIN->fulltree) {
        $settingspage->add(new admin_setting_configtext(
            'local_tad/semester',
            get_string('settings_semester_label', 'local_tad'),
            get_string('settings_semester_desc', 'local_tad'),
            ''
        ));
    }
 
    $ADMIN->add('localplugins', $settingspage);
}