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
    public function __construct($val = NULL, bool $isRequired = TRUE) {
        $this->setValueToValidate($val);
        $this->setRequired($isRequired);
    }

    /**
     * Set config options, assumes every option has appropriate property on validator
     * or its parents
     * @param array $configOptions
     */
    public function configureValidator(array $configOptions) {
        foreach ($configOptions as $option => $value) {
            if (in_array($option, ['valueToValidate', 'valueRequired'])) {
                continue;
            }

	    if (!property_exists($this, $option)) {
		throw new \InvalidArgumentException("Unknown option '{$option}'");
	    }

            $this->$option = $value;
        }
    }

    /**
     * @param mixed $val
     */
    public function setValueToValidate($val) {
        $this->valueToValidate = $val;
    }

    public function setRequired(bool $req) {
        $this->valueRequired = $req;
    }

    public function isValueRequired(): bool {
        return $this->valueRequired;
    }

    /**
     * @return mixed
     */
    public function getValueToValidate() {
        return $this->valueToValidate;
    }

    public function validate(): bool {
        if ($this->isValueRequired() && $this->isEmptyValue()) {
            return FALSE;
        } else if (!$this->isEmptyValue()) {
            return $this->validateValue();
        }

        return TRUE;
    }

    public function isNumericPartsValid(array $parts, int $partsExpectedCount): bool {
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

    protected function isEmptyValue(): bool {
        return empty($this->getValueToValidate());
    }

    protected function validateValue(): bool {
        return TRUE;
    }

}
