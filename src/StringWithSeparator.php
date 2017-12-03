<?php

namespace Ekimik\Validators;

/**
 * Base validator for strings, which has parts separated by separator
 *
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik\Validators
 */
abstract class StringWithSeparator extends StringBase {

    /**
     * @var string
     */
    protected $separator;

    public function getSeparator(): string {
        return $this->separator;
    }

}
