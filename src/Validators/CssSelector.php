<?php

namespace Ekimik\Validators;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik\Validators
 */
class CssSelector extends StringBase {

    protected $regExp = '#^[a-z0-9.\#\-_,: ]{1,}$#ui';

}
