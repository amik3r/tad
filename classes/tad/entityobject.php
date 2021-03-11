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

class Entity{
    private $entityarray = array(
        'Department of Ergonomics and Psychology         ' => 'Ergonómia és Pszichológia Tanszék',
        'Department of Philosophy and History of Science ' => 'Filozófia és Tudománytörténet Tanszék',
        'Centre of Modern Languages                      ' => 'Idegen Nyelvi Központ',
        'Department of Environmental Economics           ' => 'Környezetgazdaságtan Tanszék',
        'Department of Economics                         ' => 'Közgazdaságtan Tanszék',
        'Department of Management and Business Economics ' => 'Menedzsment és Vállalkozásgazdaságtan Tanszék',
        'Institute of Continuing Engineering Education   ' => 'Mérnöktovábbképző Intézet',
        'Department of Technical Education               ' => 'Műszaki Pedagógia Tanszék',
        'Department of Finance                           ' => 'Pénzügyek Tanszék',
        'Department of Sociology and Communication       ' => 'Szociológia és Kommunikáció Tanszék',
        'Centre of Physical Education                    ' => 'Testnevelési Központ',
        'Department of Business Law                      ' => 'Üzleti Jog Tanszék',
        'Department of Ergonomics and Psychology         ' => 'Ergonómia és Pszichológia Tanszék',
        'Department of Philosophy and History of Science ' => 'Filozófia és Tudománytörténet Tanszék',
        'Centre of Modern Languages                      ' => 'Idegen Nyelvi Központ',
        'Department of Environmental Economics           ' => 'Környezetgazdaságtan Tanszék',
        'Department of Economics                         ' => 'Közgazdaságtan Tanszék',
        'Department of Management and Business Economics ' => 'Menedzsment és Vállalkozásgazdaságtan Tanszék',
        'Institute of Continuing Engineering Education   ' => 'Mérnöktovábbképző Intézet',
        'Department of Technical Education               ' => 'Műszaki Pedagógia Tanszék',
        'Department of Finance                           ' => 'Pénzügyek Tanszék',
        'Department of Sociology and Communication       ' => 'Szociológia és Kommunikáció Tanszék',
        'Centre of Physical Education                    ' => 'Testnevelési Központ',
        'Department of Business Law                      ' => 'Üzleti Jog Tanszék',
        "Dean's Office"                                    => 'Dékáni Hivatal',
    );

    public function get_english($entity){
        /*
        * Return english name from hungarian name
        */
		if (array_key_exists($entity,$this->entityarray)){
			return $entity;
		}	
        foreach ($this->entityarray as $key => $value) {
            // remove trash
            $search = str_replace(' ', '',strtolower($entity));
            $curr = $value;
            $curr = str_replace(' ', '',strtolower($curr));


			if ($curr == $search){
				return $key;
            }
        }
    }
    public function get_hungarian($entity){
        /*
        * Return hungarian name from english name
        */
        foreach ($this->entityarray as $key => $value) {
            // remove trash

            $search = str_replace(' ', '',strtolower($entity));
            $curr = $value;
            $curr = str_replace(' ', '',strtolower($curr));

            if ($value = $search){
                return $entity;
            }
            if ($curr == $search){
                return $value;
            }
        }
    }
}
