<?php

namespace Ekimik\Validators;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik/Validators
 */
interface IValidator {

    public function validate(): bool;
}
