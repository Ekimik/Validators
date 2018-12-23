<?php

namespace Ekimik\Validators;

use \Nette\Utils\Strings;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik/Validators
 */
class StringBase extends Validator {

    const OPTION_REGEXP = 'regexp';

    protected function validateValue(): bool {
        $val = $this->getValueToValidate();
        $regExp = $this->getOption(self::OPTION_REGEXP);
        if (empty($regExp)) {
            $result = is_string($val);
        } else {
            $result = is_string($val) && Strings::match($val, $regExp);
        }

        return $result;
    }

    protected function getDefaultOptions(): array {
        $options = parent::getDefaultOptions();
        $options[self::OPTION_REGEXP] = '#^[áéíóúůýžščřďťňa-z0-9 \-_.():/]{1,}$#iu';

        return $options;
    }

}
