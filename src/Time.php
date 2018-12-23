<?php

namespace Ekimik\Validators;

use \Nette\Utils\DateTime;
use \Nette\Utils\Strings;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik/Validators
 */
class Time extends StringWithSeparator {

    protected function validateValue(): bool {
        $result = parent::validateValue();
        if ($result === FALSE) {
            return FALSE;
        }

        $val = $this->getValueToValidate();
        $separator = $this->getOption(self::OPTION_SEPARATOR);
        $timeParts = explode($separator, $val);

        $result = $this->isNumericPartsValid($timeParts, mb_substr_count($val, $separator) + 1);
        if ($result) {
            try {
                if (Strings::match($val, '#^[0-9]{1,2}.[0-9]{1,2}$#')) {
                    // add [SEPARATOR]00 if missing to get format 14:00:00
                    $val .= $separator . '00';
                }

                $date = DateTime::createFromFormat(implode($separator, ['H', 'i', 's']), $val);
                if (!$date) {
                    $result = FALSE;
                }
            } catch (\Exception $e) {
                $result = FALSE;
            }
        }

        return $result;
    }

    protected function getDefaultOptions(): array {
        $options = parent::getDefaultOptions();
        $options[self::OPTION_SEPARATOR] = ':';

        return $options;
    }

}
