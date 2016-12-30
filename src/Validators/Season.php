<?php

namespace Ekimik\Validators;

/**
 * Validator for season
 *
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik/Validators
 */
class Season extends StringWithSeparator {

    protected $separator = '/';

    protected function validateValue(): bool {
        $result = parent::validateValue();
        if ($result === FALSE) {
            return FALSE;
        }

        $val = $this->getValueToValidate();
        $seasonParts = explode($this->separator, $val);
        $result = $this->isNumericPartsValid($seasonParts, 2);

        if ($result) {
            $result = $seasonParts[0] < $seasonParts[1] && $seasonParts[1] - $seasonParts[0] === 1;
        }

        return $result;
    }

}
