<?php

namespace Ekimik\Validators;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik\Validators
 */
class Enum extends Validator {

    protected $availableOptions = [];

    protected function validateValue(): bool {
	$valueToValidate = $this->getValueToValidate();

	return is_scalar($valueToValidate) && in_array($valueToValidate, $this->availableOptions);
    }

}
