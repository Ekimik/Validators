<?php

namespace Ekimik\Validators;

/**
 * Base validator
 *
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik/Validators
 */
class Validator implements IValidator {

    /**
     * @var mixed
     */
    protected $valueToValidate;

    /**
     * @var boolean
     */
    protected $valueRequired;

    /**
     * @param mixed $val
     * @param boolean $isRequired
     */
    public function __construct($val = NULL, $isRequired = TRUE) {
        $this->setValueToValidate($val);
        $this->setRequired($isRequired);
    }

    /**
     * @param mixed $val
     */
    public function setValueToValidate($val) {
        $this->valueToValidate = $val;
    }

    /**
     * @param boolean $req
     */
    public function setRequired($req) {
        $this->valueRequired = (boolean) $req;
    }

    /**
     * @return boolean
     */
    public function isValueRequired() {
        return $this->valueRequired;
    }

    /**
     * @return mixed
     */
    public function getValueToValidate() {
        return $this->valueToValidate;
    }

    /**
     * @return boolean
     */
    public function validate() {
        $val = $this->getValueToValidate();
        if ($this->isValueRequired() && empty($val)) {
            return FALSE;
        }

        return TRUE;
    }

    /**
     * @param array $parts
     * @param int $partsExpectedCount
     * @return boolean
     */
    public function isNumericPartsValid(Array $parts, $partsExpectedCount) {
        if (count($parts) !== $partsExpectedCount) {
            return FALSE;
        }

        for ($i = 0; $i < $partsExpectedCount; $i++) {
            if (!isset($parts[$i]) || !is_numeric($parts[$i])) {
                return FALSE;
            }
        }

        return TRUE;
    }

}
