<?php

namespace Ekimik\Validators;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik/Validators
 */
class Validator implements IValidator {

    const OPTION_REQUIRED = 'required';

    /** @var mixed */
    protected $valueToValidate;
    /** @var array */
    private $options = [];

    /**
     * @param mixed $val
     * @param array $options - see self::OPTIONS_* constants
     */
    public function __construct($val, array $options = []) {
        $this->valueToValidate = $val;
        $this->configureValidator($options);
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

    public function getOptions(): array {
        return $this->options;
    }

    public function getOption(string $name) {
        if (!in_array($name, $this->getAvailableOptions())) {
            throw new \InvalidArgumentException("Unknown option '{$name}'");
        }

        return $this->options[$name] ?? NULL;
    }

    protected function isNumericPartsValid(array $parts, int $partsExpectedCount): bool {
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

    protected function isValueRequired(): bool {
        return $this->options[self::OPTION_REQUIRED] ?? TRUE;
    }

    protected function validateValue(): bool {
        return TRUE;
    }

    protected function getDefaultOptions(): array {
        return [
            self::OPTION_REQUIRED => TRUE,
        ];
    }

    protected function getAvailableOptions(): array {
        $r = new \ReflectionClass($this);
        $constants = $r->getConstants();
        $availableOptions = [];
        foreach ($constants as $constant => $value) {
            if (\Nette\Utils\Strings::startsWith($constant, 'OPTION_')) {
                $availableOptions[] = $value;
            }
        }

        return $availableOptions;
    }

    private function configureValidator(array $configOptions) {
        $options = array_merge($this->getDefaultOptions(), $configOptions);
        $availableOptions = $this->getAvailableOptions();
        $diff = array_diff(array_keys($options), $availableOptions);
        if (!empty($diff)) {
            throw new \InvalidArgumentException(sprintf('Unknown options %s', implode('|', $diff)));
        }

        $this->options = $options;
        return $this;
    }

}
