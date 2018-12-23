<?php

namespace Ekimik\Validators;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik\Validators
 */
class Enum extends Validator {

    const OPTION_OPTIONS = 'options';

    protected function validateValue(): bool {
        $valueToValidate = $this->getValueToValidate();

        return is_scalar($valueToValidate) && in_array($valueToValidate, $this->getOption(self::OPTION_OPTIONS));
    }

    protected function getDefaultOptions(): array {
        $options = parent::getDefaultOptions();
        $options[self::OPTION_OPTIONS] = [];

        return $options;
    }

}
