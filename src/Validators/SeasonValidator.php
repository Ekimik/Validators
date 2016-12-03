<?php

namespace Ekimik\Validators;

/**
 * Validator for season
 *
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik/Validators
 */
class SeasonValidator extends StringWithSeparatorValidator {

    protected $separator = '/';

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
            $seasonParts = explode($this->separator, $val);
            $result = $this->isNumericPartsValid($seasonParts, 2);

            if ($result) {
                return $seasonParts[0] < $seasonParts[1] && $seasonParts[1] - $seasonParts[0] === 1;
            }
        }

        return $result;
    }

}
