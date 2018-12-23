<?php

namespace Ekimik\Validators;

use \Nette\Utils\Validators;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik\Validators
 */
class DataType extends Validator {

    const OPTION_DATA_TYPE = 'dataType';

    protected function validateValue(): bool {
        $value = $this->getValueToValidate();
        $expectedType = $this->getOption(self::OPTION_DATA_TYPE);
        if (empty($expectedType)) {
            throw new \LogicException('You have to configure expected data type');
        }

        if (
            ($expectedType === 'string' && !is_string($value))
            || ($expectedType === 'array' && !is_array($value))
            || ($expectedType === 'float' && !Validators::isNumeric($value))
            || ($expectedType === 'numeric' && !is_numeric($value))
            || (in_array($expectedType, ['bool', 'boolean']) && !is_bool($value))
            || (in_array($expectedType, ['int', 'integer']) && !Validators::isNumericInt($value))
        ) {
            return FALSE;
        }

        return TRUE;
    }

    protected function isEmptyValue(): bool {
        return FALSE;
    }

    protected function isValueRequired(): bool {
        return FALSE;
    }

}
