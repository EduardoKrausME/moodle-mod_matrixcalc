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
 * restore_matrixcalc_stepslib.php
 *
 * @package   mod_matrixcalc
 * @copyright 2026 Eduardo Kraus {@link https://eduardokraus.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class restore_matrixcalc_activity_structure_step extends restore_activity_structure_step {
    /**
     * Method define_structure.
     *
     * @return array Return value.
     */
    protected function define_structure(): array {
        return $this->prepare_activity_structure([
            new restore_path_element("matrixcalc", "/activity/matrixcalc"),
        ]);
    }

    /**
     * Method process_matrixcalc.
     *
     * @param mixed $data Parameter data.
     * @return void Return value.
     */
    protected function process_matrixcalc($data): void {
        global $DB;

        $data = (object) $data;
        $data->course = $this->get_courseid();
        $data->timecreated = $this->apply_date_offset($data->timecreated);
        $data->timemodified = $this->apply_date_offset($data->timemodified);

        $newitemid = $DB->insert_record("matrixcalc", $data);
        $this->apply_activity_instance($newitemid);
    }

    /**
     * Method after_execute.
     *
     * @return void Return value.
     */
    protected function after_execute(): void {
        $this->add_related_files("mod_matrixcalc", "intro", null);
    }
}
