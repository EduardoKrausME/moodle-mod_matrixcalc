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
 * view.php
 *
 * @package   mod_matrixcalc
 * @copyright 2026 Eduardo Kraus {@link https://eduardokraus.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . "/../../config.php");

$id = required_param("id", PARAM_INT);
$cm = get_coursemodule_from_id("matrixcalc", $id, 0, false, MUST_EXIST);
$course = get_course($cm->course);
$matrixcalc = $DB->get_record("matrixcalc", ["id" => $cm->instance], "*", MUST_EXIST);

require_login($course, true, $cm);
$context = context_module::instance($cm->id);
require_capability("mod/matrixcalc:view", $context);

$event = \mod_matrixcalc\event\course_module_viewed::create([
    "objectid" => $matrixcalc->id,
    "context" => $context,
]);
$event->add_record_snapshot("matrixcalc", $matrixcalc);
$event->trigger();

$completion = new completion_info($course);
$completion->set_module_viewed($cm);

$PAGE->set_url("/mod/matrixcalc/view.php", ["id" => $cm->id]);
$PAGE->set_title(format_string($matrixcalc->name));
$PAGE->set_heading(format_string($course->fullname));
$PAGE->set_context($context);

$options = [
    "maxSize" => (int) $matrixcalc->maxsize,
    "operations" => [
        "add" => !empty($matrixcalc->allowadd),
        "multiply" => !empty($matrixcalc->allowmultiply),
        "determinant" => !empty($matrixcalc->allowdeterminant),
        "transpose" => !empty($matrixcalc->allowtranspose),
        "inverse" => !empty($matrixcalc->allowinverse),
    ],
];

$PAGE->requires->strings_for_js([
    "determinantof",
    "dividerow",
    "identityreached",
    "invaliddimensionsadd",
    "invaliddimensionsmultiply",
    "inverseof",
    "nooperation",
    "replacerow",
    "singularmatrix",
    "squarerequired",
    "swaprows",
    "transposeof",
], "mod_matrixcalc");
$PAGE->requires->js_call_amd("mod_matrixcalc/calculator", "init", [$options]);

$templatecontext = [
    "allowadd" => !empty($matrixcalc->allowadd),
    "allowmultiply" => !empty($matrixcalc->allowmultiply),
    "allowdeterminant" => !empty($matrixcalc->allowdeterminant),
    "allowtranspose" => !empty($matrixcalc->allowtranspose),
    "allowinverse" => !empty($matrixcalc->allowinverse),
    "maxsize" => (int) $matrixcalc->maxsize,
];

echo $OUTPUT->header();

if (!empty($matrixcalc->intro)) {
    echo $OUTPUT->box(format_module_intro("matrixcalc", $matrixcalc, $cm->id), "generalbox mod_introbox", "matrixcalcintro");
}

echo $OUTPUT->render_from_template("mod_matrixcalc/calculator", $templatecontext);
echo $OUTPUT->footer();
