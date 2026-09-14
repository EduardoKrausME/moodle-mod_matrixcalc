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
 * instance_manager.php
 *
 * @package   mod_matrixcalc
 * @copyright 2026 Eduardo Kraus {@link https://eduardokraus.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_matrixcalc;

/**
 * Class instance_manager.
 */
class instance_manager {
    /**
     * Method add.
     *
     * @param \stdClass $data Parameter data.
     * @return int Return value.
     */
    public static function add(\stdClass $data): int {
        global $DB;

        self::normalize($data);
        $data->timecreated = time();
        $data->timemodified = $data->timecreated;

        return $DB->insert_record("matrixcalc", $data);
    }

    /**
     * Method update.
     *
     * @param \stdClass $data Parameter data.
     * @return bool Return value.
     */
    public static function update(\stdClass $data): bool {
        global $DB;

        self::normalize($data);
        $data->id = $data->instance;
        $data->timemodified = time();

        return $DB->update_record("matrixcalc", $data);
    }

    /**
     * Method normalize.
     *
     * @param \stdClass $data Parameter data.
     * @return void Return value.
     */
    private static function normalize(\stdClass $data): void {
        foreach (["allowadd", "allowmultiply", "allowdeterminant", "allowtranspose", "allowinverse"] as $field) {
            $data->{$field} = empty($data->{$field}) ? 0 : 1;
        }
        $data->maxsize = max(2, min(8, (int) ($data->maxsize ?? 6)));
    }

    /**
     * Method delete.
     *
     * @param int $id Parameter id.
     * @return bool Return value.
     */
    public static function delete(int $id): bool {
        global $DB;

        if (!$DB->record_exists("matrixcalc", ["id" => $id])) {
            return false;
        }

        return $DB->delete_records("matrixcalc", ["id" => $id]);
    }
}
