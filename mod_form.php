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
 * mod_form.php
 *
 * @package   mod_matrixcalc
 * @copyright 2026 Eduardo Kraus {@link https://eduardokraus.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

require_once("{$CFG->dirroot}/course/moodleform_mod.php");

/**
 * Class mod_matrixcalc_mod_form.
 */
class mod_matrixcalc_mod_form extends moodleform_mod {
    /**
     * Method definition.
     *
     * @return void Return value.
     */
    public function definition(): void {
        $mform = $this->_form;

        $mform->addElement("text", "name", get_string("matrixcalcname", "mod_matrixcalc"), ["size" => 64]);
        $mform->setType("name", PARAM_TEXT);
        $mform->addRule("name", null, "required", null, "client");
        $mform->addRule("name", get_string("maximumchars", "", 255), "maxlength", 255, "client");

        $this->standard_intro_elements();

        $mform->addElement("html", html_writer::tag("h3", get_string("operations", "mod_matrixcalc")));
        $mform->addElement("advcheckbox", "allowadd", get_string("allowadd", "mod_matrixcalc"));
        $mform->addElement("advcheckbox", "allowmultiply", get_string("allowmultiply", "mod_matrixcalc"));
        $mform->addElement("advcheckbox", "allowdeterminant", get_string("allowdeterminant", "mod_matrixcalc"));
        $mform->addElement("advcheckbox", "allowtranspose", get_string("allowtranspose", "mod_matrixcalc"));
        $mform->addElement("advcheckbox", "allowinverse", get_string("allowinverse", "mod_matrixcalc"));

        foreach (["allowadd", "allowmultiply", "allowdeterminant", "allowtranspose", "allowinverse"] as $field) {
            $mform->setDefault($field, 1);
        }

        $sizes = [];
        for ($size = 2; $size <= 8; $size++) {
            $sizes[$size] = $size;
        }
        $mform->addElement("select", "maxsize", get_string("maxsize", "mod_matrixcalc"), $sizes);
        $mform->setDefault("maxsize", 6);
        $mform->addHelpButton("maxsize", "maxsize", "mod_matrixcalc");

        $this->standard_coursemodule_elements();
        $this->add_action_buttons();
    }

    /**
     * Method validation.
     *
     * @param mixed $data Parameter data.
     * @param mixed $files Parameter files.
     * @return array Return value.
     */
    public function validation($data, $files): array {
        $errors = parent::validation($data, $files);
        $fields = ["allowadd", "allowmultiply", "allowdeterminant", "allowtranspose", "allowinverse"];
        $enabled = false;

        foreach ($fields as $field) {
            if (!empty($data[$field])) {
                $enabled = true;
                break;
            }
        }

        if (!$enabled) {
            $errors["allowadd"] = get_string("atleastoneoperation", "mod_matrixcalc");
        }

        return $errors;
    }
}
