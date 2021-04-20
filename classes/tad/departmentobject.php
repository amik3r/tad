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
 * 
 */

class Department{
    private $departmentascodearray = array(
        "GT20"	=> "Menedzsment és Vállalkozásgazdaságtan Tanszék",
        "GT30"	=> "Közgazdaságtan Tanszék",
        "GT35"	=> "Pénzügyek Tanszék",
        "GT41"	=> "Filozófia és Tudománytörténet Tanszék",
        "GT42"	=> "Környezetgazdaságtan Tanszék",
        "GT43"	=> "Szociológia és Kommunikáció Tanszék",
        "GT51"	=> "Műszaki Pedagógia Tanszék",
        "GT52"	=> "Ergonómia és Pszichológia Tanszék",
        "GT55"	=> "Üzleti Jog Tanszék",
        "GT61"	=> "Idegen Nyelvi Központ",
        "GT62"	=> "Idegen Nyelvi Központ",
        "GT63"	=> "Idegen Nyelvi Központ",
        "GT65"	=> "Idegen Nyelvi Központ",
        "GT70"	=> "Testnevelési Központ",
        "GTDH"  => "Dékáni Hivatal"
    );
    private $departmentarray = array(
        'Department of Ergonomics and Psychology'                   => 'Ergonómia és Pszichológia Tanszék',
        'Department of Philosophy and History of Science '          => 'Filozófia és Tudománytörténet Tanszék',
        'Centre of Modern Languages'                                => 'Idegen Nyelvi Központ',
        'Department of Environmental Economics'                     => 'Környezetgazdaságtan Tanszék',
        'Department of Economics'                                   => 'Közgazdaságtan Tanszék',
        'Department of Management and Business Economics'           => 'Menedzsment és Vállalkozásgazdaságtan Tanszék',
        'Institute of Continuing Engineering Education'             => 'Mérnöktovábbképző Intézet',
        'Department of Technical Education'                         => 'Műszaki Pedagógia Tanszék',
        'Department of Sociology and Communication'                 => 'Szociológia és Kommunikáció Tanszék',
        'Centre of Physical Education'                              => 'Testnevelési Központ',
        'Department of Business Law'                                => 'Üzleti Jog Tanszék',
        'Department of Finance'                                     => 'Pénzügyek Tanszék',
        "Dean's Office"                                             => 'Dékáni Hivatal',
    );

    public function get_department_by_code($code){
        $code = strtolower($code); 
        foreach ($this->departmentascodearray as $key => $value) {
            if (strtolower($key) == $code){
                return $value;
            } else {
                continue;
            }
        }
        return false;
    }

    function get_departments_with_code(){
        $arr = [];
        foreach ($this->departmentascodearray as $key => $value) {
            $dep = new stdClass();
            $dep->name = $value;
            $dep->value = $key;
            array_push($arr, $dep);
        }
        var_dump($arr);
        return $arr;
    }

    public function get_code($departmentname){
        foreach ($this->departmentascodearray as $key => $value) {
            if ($value == $departmentname){
                return $key;
            }
        }
    }

    public function get_english($department){
        /*
        * Return english name from hungarian name
        */
		if (array_key_exists($department, $this->departmentarray)){
			return $department;
		}	
        foreach ($this->departmentarray as $key => $value) {
            // remove trash
            $search = str_replace(' ', '',strtolower($department));
            $curr = $value;
            $curr = str_replace(' ', '',strtolower($curr));

            if ($value == $search){
                return $department;
            }
			if ($curr == $search){
				return $key;
            }
        }
    }
    public function get_hungarian($department){
        /*
        * Return hungarian name from english name
        */
        foreach ($this->departmentarray as $value) {
            // remove trash
            $search = str_replace(' ', '',strtolower($department));
            $curr = $value;
            $curr = str_replace(' ', '',strtolower($curr));

            if ($value = $search){
                return $department;
            }
            if ($curr == $search){
                return $value;
            }
        }
    }
}
