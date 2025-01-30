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
 * Library functions for the Course Completion Report plugin.
 *
 * @package   local_coursecompletionreport
 * @copyright 2025 Pablo Díaz 
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Extends navigation for the Course Completion Report plugin.
 *
 * @param settings_navigation $nav The settings navigation object.
 */
function local_coursecompletionreport_extend_navigation_admin(settings_navigation $nav) {
    $reportnode = $nav->find('reports', navigation_node::TYPE_CONTAINER);
    if ($reportnode) {
        $url = new moodle_url('/local/coursecompletionreport/index.php');
        $reportnode->add(
            get_string('pluginname', 'local_coursecompletionreport'),
            $url,
            navigation_node::TYPE_SETTING,
            null,
            null,
            new pix_icon('i/report', '')
        );
    }
}
