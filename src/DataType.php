<?php

namespace Ekimik\Validators;

use \Nette\Utils\Validators;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik\Validators
 */
class DataType extends Validator {

    protected $expectedType;

    public function getExpectedType() {
	return $this->expectedType;
    }

    public function setExpectedType($expectedType) {
	$this->expectedType = $expectedType;
	return $this;
    }

    public function isValueRequired(): bool {
	return FALSE;
    }

    protected function validateValue(): bool {
	$value = $this->getValueToValidate();
	$expectedType = $this->getExpectedType();
	if (empty($expectedType)) {
	    throw new \LogicException('You have to configure expected data type');
	}

	if (
		($expectedType === 'string' && !is_string($value))
		|| ($expectedType === 'array' && !is_array($value))
		|| ($expectedType === 'float' && !Validators::isNumeric($value))
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

}
