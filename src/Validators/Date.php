<?php

namespace Ekimik\Validators;

use \Nette\Utils\DateTime;

/**
 * Validator for date
 *
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik/Validators
 */
class Date extends StringWithSeparator {

    protected $separator = '-';

    protected function validateValue(): bool {
        $result = parent::validateValue();
        if ($result === FALSE) {
            return FALSE;
        }

        $val = $this->getValueToValidate();
        $dateParts = explode($this->separator, $val);

        $result = $this->isNumericPartsValid(
                $dateParts, mb_substr_count($this->getValueToValidate(), $this->separator) + 1
        );

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

}
