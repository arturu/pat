<?php
/**
 * Nome applicativo: PAT
 * Licenza di utilizzo: GNU Affero General Public License» versione 3 e successive: https://spdx.org/licenses/AGPL-3.0-or-later.html
 */

namespace Helpers\Validators;

defined('_FRAMEWORK_') or exit('No direct script access allowed');

class FiscalCodeRule
{
    protected bool $isValidate = false;

    public function __construct($value)
    {
        $cf = !empty($value) ? $value : '';

        if (strlen((string)$cf) != 16) {
            $this->isValidate = false;
            return false;
        }

        $cf = strtoupper($cf);
        if (!preg_match("/[A-Z0-9]+$/", $cf)) {
            $this->isValidate = false;
            return false;
        }

        $s = 0;
        for ($i = 1; $i <= 13; $i += 2) {
            $c = $cf[$i];
            if ('0' <= $c and $c <= '9') {
                $s += ord($c) - ord('0');
            } else {
                $s += ord($c) - ord('A');
            }
        }

        for ($i = 0; $i <= 14; $i += 2) {
            $c = $cf[$i];
            switch ($c) {
                case 'A':
                case '0':
                    $s += 1;
                    break;
                case 'B':
                case '1':
                    $s += 0;
                    break;
                case 'C':
                case '2':
                    $s += 5;
                    break;
                case 'D':
                case '3':
                    $s += 7;
                    break;
                case 'E':
                case '4':
                    $s += 9;
                    break;
                case 'F':
                case '5':
                    $s += 13;
                    break;
                case 'G':
                case '6':
                    $s += 15;
                    break;
                case 'H':
                case '7':
                    $s += 17;
                    break;
                case 'I':
                case '8':
                    $s += 19;
                    break;
                case 'J':
                case '9':
                    $s += 21;
                    break;
                case 'K':
                    $s += 2;
                    break;
                case 'L':
                    $s += 4;
                    break;
                case 'M':
                    $s += 18;
                    break;
                case 'N':
                    $s += 20;
                    break;
                case 'O':
                    $s += 11;
                    break;
                case 'P':
                    $s += 3;
                    break;
                case 'Q':
                    $s += 6;
                    break;
                case 'R':
                    $s += 8;
                    break;
                case 'S':
                    $s += 12;
                    break;
                case 'T':
                    $s += 14;
                    break;
                case 'U':
                    $s += 16;
                    break;
                case 'V':
                    $s += 10;
                    break;
                case 'W':
                    $s += 22;
                    break;
                case 'X':
                    $s += 25;
                    break;
                case 'Y':
                    $s += 24;
                    break;
                case 'Z':
                    $s += 23;
                    break;
            }
        }

        if (chr($s % 26 + ord('A')) != $cf[15]) {
            $this->isValidate = false;
            return false;
        }

        $this->isValidate = true;
    }

    /** @noinspection PhpInconsistentReturnPointsInspection */

    public function isValidate(): bool
    {
        return $this->isValidate;
    }
}
