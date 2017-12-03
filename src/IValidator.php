<?php

namespace Ekimik\Validators;

/**
 * Interface for all validators
 *
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik/Validators
 */
interface IValidator {

    public function validate(): bool;
}
