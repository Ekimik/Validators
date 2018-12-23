<?php

namespace Ekimik\Validators;

use \Nette\Utils\DateTime;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik/Validators
 */
class Date extends StringWithSeparator {

    protected function validateValue(): bool {
        $result = parent::validateValue();
        if ($result === FALSE) {
            return FALSE;
        }

        $val = $this->getValueToValidate();
        $separator = $this->getOption(self::OPTION_SEPARATOR);
        $dateParts = explode($separator, $val);

        $result = $this->isNumericPartsValid($dateParts, mb_substr_count($val, $separator) + 1);
        if ($result) {
            try {
                $foo = DateTime::from($val);
                $result = TRUE;
            } catch (\Exception $e) {
                $result = FALSE;
            }
        }

        return $result;
    }

    protected function getDefaultOptions(): array {
        $options = parent::getDefaultOptions();
        $options[self::OPTION_SEPARATOR] = '-';

        return $options;
    }

}
