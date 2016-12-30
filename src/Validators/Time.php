<?php

namespace Ekimik\Validators;

use \Nette\Utils\DateTime,
    \Nette\Utils\Strings;

/**
 * Validator for time
 *
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik/Validators
 */
class Time extends StringWithSeparator {

    protected $separator = ':';

    protected function validateValue(): bool {
        $result = parent::validateValue();
        if ($result === FALSE) {
            return FALSE;
        }

        $val = $this->getValueToValidate();
        $timeParts = explode($this->separator, $val);

        $result = $this->isNumericPartsValid(
                $timeParts, mb_substr_count($this->getValueToValidate(), $this->separator) + 1
        );

        if ($result) {
            try {
                if (Strings::match($val, '#^[0-9]{1,2}.[0-9]{1,2}$#')) {
                    // add [SEPARATOR]00 if missing to get format 14:00:00
                    $val .= $this->separator . '00';
                }

                $date = DateTime::createFromFormat(implode($this->separator, ['H', 'i', 's']), $val);
                if (!$date) {
                    $result = FALSE;
                }
            } catch (\Exception $ex) {
                $result = FALSE;
            }
        }

        return $result;
    }

}
