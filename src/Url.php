<?php

namespace Ekimik\Validators;

use \Nette\Utils\Validators;
use \Nette\Utils\Strings;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik\Validators
 */
class Url extends StringBase {

    const OPTION_FULLY_QUALIFIED = 'fullyQualified';

    protected function validateValue(): bool {
        $result = parent::validateValue();
        if ($result === FALSE) {
            return FALSE;
        }

        $val = $this->getValueToValidate();
        if (
            !$this->getOption(self::OPTION_FULLY_QUALIFIED)
            && !Strings::startsWith($val, 'http')
            && !Strings::startsWith($val, 'https')
        ) {
            $val = "http://{$val}";
        }

        return Validators::isUrl($val);
    }

    protected function getDefaultOptions(): array {
        $options = parent::getDefaultOptions();
        $options[self::OPTION_FULLY_QUALIFIED] = TRUE;
        $options[self::OPTION_REGEXP] = NULL;

        return $options;
    }

}
