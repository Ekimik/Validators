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
class TimeValidator extends StringWithSeparatorValidator {

    protected $separator = ':';

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
                        return FALSE;
                    }
                } catch (\Exception $ex) {
                    return FALSE;
                }
            }
        }

        return $result;
    }

}
