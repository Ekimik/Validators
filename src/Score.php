<?php

namespace Ekimik\Validators;

/**
 * Validator for score
 *
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik/Validators
 */
class Score extends StringWithSeparator {

    protected $separator = '-';

    protected function validateValue(): bool {
        $result = parent::validateValue();
        if ($result === FALSE) {
            return FALSE;
        }

        $val = $this->getValueToValidate();
        $scoreParts = explode($this->separator, $val);
        $result = $this->isScorePartsValid($scoreParts);

        return $result;
    }

    /**
     * @param array $parts
     * @return boolean
     */
    protected function isScorePartsValid(Array $parts) {
        $isValid = $this->isNumericPartsValid($parts, 2);
        if (!$isValid) {
            return $isValid;
        }

        $homeScore = $parts[0];
        $awayScore = $parts[1];
        if ($homeScore >= 0 && $homeScore < 50 && $awayScore >= 0 && $awayScore < 50) {
            return TRUE;
        }

        return FALSE;
    }

}
