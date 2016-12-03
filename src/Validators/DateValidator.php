<?php

namespace Ekimik\Validators;

use \Nette\Utils\DateTime;

/**
 * Validator for date
 *
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik/Validators
 */
class DateValidator extends StringWithSeparatorValidator {

    protected $separator = '-';

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
            $dateParts = explode($this->separator, $val);

            $result = $this->isNumericPartsValid(
                    $dateParts, mb_substr_count($this->getValueToValidate(), $this->separator) + 1
            );

            if ($result) {
                try {
                    DateTime::from($val);
                    return TRUE;
                } catch (\Exception $e) {
                    return FALSE;
                }
            }
        }

        return $result;
    }

}
