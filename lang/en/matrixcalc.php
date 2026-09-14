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
 * matrixcalc.php
 *
 * @package   mod_matrixcalc
 * @copyright 2026 Eduardo Kraus {@link https://eduardokraus.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

$string['add'] = 'A + B';
$string['allowadd'] = 'Addition';
$string['allowdeterminant'] = 'Determinant';
$string['allowinverse'] = 'Inverse';
$string['allowmultiply'] = 'Multiplication';
$string['allowtranspose'] = 'Transpose';
$string['atleastoneoperation'] = 'Enable at least one operation.';
$string['calculation'] = 'Calculation';
$string['choosematrix'] = 'Choose A or B';
$string['clear'] = 'Clear matrices';
$string['columns'] = 'Columns';
$string['determinant'] = 'Determinant';
$string['determinantof'] = 'Determinant of';
$string['dividerow'] = 'R{row} ← R{row} ÷ ({divisor})';
$string['identityreached'] = 'The left side is now the identity matrix; the right side is the inverse.';
$string['invaliddimensionsadd'] = 'Addition requires A and B to have exactly the same dimensions.';
$string['invaliddimensionsmultiply'] = 'Multiplication requires the number of columns in A to equal the number of rows in B.';
$string['inverse'] = 'Inverse';
$string['inverseof'] = 'Inverse of';
$string['matrixa'] = 'Matrix A';
$string['matrixb'] = 'Matrix B';
$string['matrixcalc:addinstance'] = 'Add a new matrix calculator';
$string['matrixcalc:view'] = 'Use the matrix calculator';
$string['matrixcalcname'] = 'Activity name';
$string['maxsize'] = 'Maximum matrix dimension';
$string['maxsize_help'] = 'Limits the number of rows and columns students can choose. Smaller limits keep step-by-step calculations easier to read.';
$string['modulename'] = 'Matrix calculator';
$string['modulename_help'] = 'Interactive matrix calculator with step-by-step operations.';
$string['modulenameplural'] = 'Matrix calculators';
$string['multiply'] = 'A × B';
$string['multiplyrow'] = 'R{row} ← ({factor})R{row}';
$string['nooperation'] = 'No operation is enabled for this activity.';
$string['operations'] = 'Available operations';
$string['pluginadministration'] = 'Matrix calculator administration';
$string['pluginname'] = 'Matrices';
$string['privacy:metadata'] = 'The Matrix calculator does not store personal data.';
$string['replacerow'] = 'R{target} ← R{target} − ({factor})R{source}';
$string['result'] = 'Result';
$string['rows'] = 'Rows';
$string['singularmatrix'] = 'This matrix has determinant 0, so its inverse does not exist.';
$string['squarerequired'] = 'This operation requires a square matrix.';
$string['steps'] = 'Step by step';
$string['swappingrows'] = 'Swap rows';
$string['swaprows'] = 'Swap R{a} and R{b}';
$string['transpose'] = 'Transpose';
$string['transposeof'] = 'Transpose of';
