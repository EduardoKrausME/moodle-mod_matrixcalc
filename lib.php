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
 * lib.php
 *
 * @package   mod_matrixcalc
 * @copyright 2026 Eduardo Kraus {@link https://eduardokraus.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * matrixcalc_supports
 *
 * @param string $feature
 * @return string|true|null
 */
function matrixcalc_supports(string $feature) {
    return match ($feature) {
        FEATURE_MOD_INTRO => true,
        FEATURE_SHOW_DESCRIPTION => true,
        FEATURE_COMPLETION_TRACKS_VIEWS => true,
        FEATURE_BACKUP_MOODLE2 => true,
        FEATURE_MOD_PURPOSE => MOD_PURPOSE_OTHER,
        default => null,
    };
}

/**
 * matrixcalc_add_instance
 *
 * @param stdClass $data
 * @param $mform
 * @return int
 */
function matrixcalc_add_instance(stdClass $data, $mform = null): int {
    return \mod_matrixcalc\instance_manager::add($data);
}

/**
 * matrixcalc_update_instance
 *
 * @param stdClass $data
 * @param $mform
 * @return bool
 */
function matrixcalc_update_instance(stdClass $data, $mform = null): bool {
    return \mod_matrixcalc\instance_manager::update($data);
}

/**
 * matrixcalc_delete_instance
 *
 * @param int $id
 * @return bool
 */
function matrixcalc_delete_instance(int $id): bool {
    return \mod_matrixcalc\instance_manager::delete($id);
}
