<?php

namespace Ekimik\Validators;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik\Validators
 */
class CssSelector extends StringBase {

    protected function getDefaultOptions(): array {
        $options = parent::getDefaultOptions();
        $options[self::OPTION_REGEXP] = '#^[a-z0-9.\#\-_,: ]{1,}$#ui';

        return $options;
    }

}
