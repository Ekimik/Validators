<?php

namespace Ekimik\Validators;

use \Nette\Utils\Strings;

/**
 * Validator for strings
 *
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik/Validators
 */
class StringValidator extends Validator {

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
            if (is_string($val)) {
                if (Strings::match($val, '#[a-z0-9 \-_.():]#iu')) {
                    return TRUE;
                }
            }

            return FALSE;
        }

        return $result;
    }

}
