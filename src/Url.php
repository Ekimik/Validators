<?php

namespace Ekimik\Validators;

use \Nette\Utils\Validators,
    \Nette\Utils\Strings;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik\Validators
 */
class Url extends StringBase {

    protected $fullyQualifiedOnly = TRUE;
    protected $regExp = NULL;

    protected function validateValue(): bool {
        $result = parent::validateValue();
        if ($result === FALSE) {
            return FALSE;
        }

        $val = $this->getValueToValidate();

        if (!$this->fullyQualifiedOnly && !Strings::startsWith($val, 'http') && !Strings::startsWith($val, 'https')) {
            $val = "http://{$val}";
        }

        return Validators::isUrl($val);
    }

}
