<?php

namespace Ekimik\Validators;

/**
 * Base validator for strings, which has parts separated by separator
 *
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Fooo
 */
abstract class StringWithSeparatorValidator extends StringValidator {

    /**
     * @var string
     */
    protected $separator;

    /**
     * @param mixed $val
     * @param boolean $isRequired
     * @param string|null $sep
     */
    public function __construct($val = NULL, $isRequired = TRUE, $sep = NULL) {
        parent::__construct($val, $isRequired);
        $this->setSeparator($sep);
    }

    /**
     * @return string
     */
    public function getSeparator() {
        return $this->separator;
    }

    /**
     * @param string $separator
     */
    public function setSeparator($separator) {
        if (!empty($separator)) {
            $this->separator = $separator;
        }
    }

}
