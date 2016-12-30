<?php

namespace Ekimik\Validators;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik\Validators
 */
class Boolean extends Validator {

    protected function validateValue(): bool {
        $val = $this->getValueToValidate();
        $result = is_bool($val) || in_array($val, [1, 0, '1', '0'], TRUE);

        return $result;
    }

    protected function isEmptyValue(): bool {
        $val = $this->getValueToValidate();
        return is_null($val) || $val === '';
    }

}
