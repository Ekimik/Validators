<?php

namespace Ekimik\Validators;

use \Nette\Utils\Strings;

/**
 * Validator for strings
 *
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik/Validators
 */
class StringBase extends Validator {

    protected $regExp = '#^[áéíóúůýžščřďťňa-z0-9 \-_.():/]{1,}$#iu';

    protected function validateValue(): bool {
        $val = $this->getValueToValidate();
        if (empty($this->regExp)) {
            $result = is_string($val);
        } else {
            $result = is_string($val) && Strings::match($val, $this->regExp);
        }

        return $result;
    }

}
