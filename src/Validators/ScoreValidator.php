<?php

namespace Ekimik\Validators;

/**
 * Validator for score
 *
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik/Validators
 */
class ScoreValidator extends StringWithSeparatorValidator {

    protected $separator = '-';

    /**
     * @return boolean
     */
    public function validate() {
        $result = parent::validate();
        if ($result === FALSE) {
            return $result;
        }

        $val = $this->getValueToValidate();
        if ($this->isValueRequired() || !empty($val)) {
            $scoreParts = explode($this->separator, $val);
            $result = $this->isScorePartsValid($scoreParts);
        }

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
