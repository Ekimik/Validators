<?php

namespace Ekimik\Validators;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik\Validators
 */
class Email extends StringBase {

    protected function validateValue(): bool {
        return \Nette\Utils\Validators::isEmail($this->getValueToValidate());
    }

}
