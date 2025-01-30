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
 * Main page for the Course Completion Report plugin.
 *
 * @package   local_coursecompletionreport
 * @copyright 2025 Pablo Díaz 
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . '/../../config.php');
require_login();

if (!is_siteadmin()) {
    throw new moodle_exception('adminonly', 'local_coursecompletionreport');
}

$PAGE->set_context(context_system::instance());
$PAGE->set_url(new moodle_url('/local/coursecompletionreport/index.php'));
$PAGE->set_title(get_string('reporttitle', 'local_coursecompletionreport'));
$PAGE->set_heading(get_string('reporttitle', 'local_coursecompletionreport'));

echo $OUTPUT->header();

$userid = optional_param('userid', 0, PARAM_INT);

if ($userid === 0) {
    $users = $DB->get_records('user', ['deleted' => 0], 'lastname ASC');
    echo html_writer::tag('h2', get_string('userselection', 'local_coursecompletionreport'));

    echo html_writer::start_tag('ul');
    foreach ($users as $user) {
        $userurl = new moodle_url('/local/coursecompletionreport/index.php', ['userid' => $user->id]);
        echo html_writer::tag('li', html_writer::link($userurl, fullname($user)));
    }
    echo html_writer::end_tag('ul');
} else {
    $courses = enrol_get_all_users_courses($userid);
    $table = new html_table();
    $table->head = [
        get_string('coursename', 'local_coursecompletionreport'),
        get_string('completionstatus', 'local_coursecompletionreport'),
        get_string('timecompleted', 'local_coursecompletionreport'),
    ];

    foreach ($courses as $course) {
        $completion = $DB->get_record('course_completions', ['course' => $course->id, 'userid' => $userid]);
        $status = $completion && $completion->timecompleted
            ? get_string('completestatus_complete', 'local_coursecompletionreport')
            : get_string('completestatus_notcomplete', 'local_coursecompletionreport');
        $timecompleted = $completion && $completion->timecompleted
            ? userdate($completion->timecompleted)
            : '-';

        $table->data[] = [
            html_writer::link(new moodle_url('/course/view.php', ['id' => $course->id]), $course->fullname),
            $status,
            $timecompleted,
        ];
    }

    if (empty($table->data)) {
        echo html_writer::tag('p', get_string('nocompletions', 'local_coursecompletionreport'));
    } else {
        echo html_writer::table($table);
    }
}

echo $OUTPUT->footer();
