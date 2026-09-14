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
$string['allowadd'] = 'Soma';
$string['allowdeterminant'] = 'Determinante';
$string['allowinverse'] = 'Inversa';
$string['allowmultiply'] = 'Multiplicação';
$string['allowtranspose'] = 'Transposta';
$string['atleastoneoperation'] = 'Ative pelo menos uma operação.';
$string['calculation'] = 'Cálculo';
$string['choosematrix'] = 'Escolha A ou B';
$string['clear'] = 'Limpar matrizes';
$string['columns'] = 'Colunas';
$string['determinant'] = 'Determinante';
$string['determinantof'] = 'Determinante de';
$string['dividerow'] = 'R{row} ← R{row} ÷ ({divisor})';
$string['identityreached'] = 'O lado esquerdo chegou à matriz identidade; o lado direito é a matriz inversa.';
$string['invaliddimensionsadd'] = 'Para somar, A e B precisam ter exatamente as mesmas dimensões.';
$string['invaliddimensionsmultiply'] = 'Para multiplicar, o número de colunas de A precisa ser igual ao número de linhas de B.';
$string['inverse'] = 'Inversa';
$string['inverseof'] = 'Inversa de';
$string['matrixa'] = 'Matriz A';
$string['matrixb'] = 'Matriz B';
$string['matrixcalc:addinstance'] = 'Adicionar uma calculadora de matrizes';
$string['matrixcalc:view'] = 'Usar a calculadora de matrizes';
$string['matrixcalcname'] = 'Nome da atividade';
$string['maxsize'] = 'Dimensão máxima da matriz';
$string['maxsize_help'] = 'Limita o número de linhas e colunas que o aluno pode escolher. Limites menores deixam os cálculos passo a passo mais fáceis de acompanhar.';
$string['modulename'] = 'Calculadora de matrizes';
$string['modulename_help'] = 'Calculadora interativa de matrizes com operações exibidas passo a passo.';
$string['modulenameplural'] = 'Calculadoras de matrizes';
$string['multiply'] = 'A × B';
$string['multiplyrow'] = 'R{row} ← ({factor})R{row}';
$string['nooperation'] = 'Nenhuma operação está habilitada nesta atividade.';
$string['operations'] = 'Operações disponíveis';
$string['pluginname'] = 'Matrizes';
$string['privacy:metadata'] = 'A Calculadora de matrizes não armazena dados pessoais.';
$string['replacerow'] = 'R{target} ← R{target} − ({factor})R{source}';
$string['result'] = 'Resultado';
$string['rows'] = 'Linhas';
$string['singularmatrix'] = 'Esta matriz tem determinante 0, portanto não possui inversa.';
$string['squarerequired'] = 'Esta operação exige uma matriz quadrada.';
$string['steps'] = 'Cálculo passo a passo';
$string['swaprows'] = 'Trocar R{a} com R{b}';
$string['transpose'] = 'Transposta';
$string['transposeof'] = 'Transposta de';
