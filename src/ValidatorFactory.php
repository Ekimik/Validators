<?php

namespace Ekimik\Validators;

use \Nette\Utils\Strings;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik\Validators
 */
class ValidatorFactory {

    const VALIDATOR_DATE = 'date';
    const VALIDATOR_TIME = 'time';
    const VALIDATOR_STRING = 'string';
    const VALIDATOR_SCORE = 'score';
    const VALIDATOR_SEASON = 'season';
    const VALIDATOR_BOOL = 'bool';
    const VALIDATOR_URL = 'url';
    const VALIDATOR_CSS_SELECTOR = 'css-selector';
    const VALIDATOR_ENUM = 'enum';
    const VALIDATOR_DATA_TYPE = 'data-type';
    const VALIDATOR_EMAL = 'email';

    /**
     * @param string $name
     * @param mixed $valueToValidate
     * @param array $options - see concrete validator class OPTIONS_* constants for available options for certain validator
     * @return IValidator
     */
    public function create(string $name, $valueToValidate, array $options = []): IValidator {
        $normalizedName = Strings::lower($name);

        $validator = NULL;
        if ($normalizedName === self::VALIDATOR_DATE) {
            $validator = new Date($valueToValidate, $options);
        } else if ($normalizedName === self::VALIDATOR_TIME) {
            $validator = new Time($valueToValidate, $options);
        } else if ($normalizedName === self::VALIDATOR_STRING) {
            $validator = new StringBase($valueToValidate, $options);
        } else if ($normalizedName === self::VALIDATOR_SCORE) {
            $validator = new Score($valueToValidate, $options);
        } else if ($normalizedName === self::VALIDATOR_SEASON) {
            $validator = new Season($valueToValidate, $options);
        } else if ($normalizedName === self::VALIDATOR_BOOL) {
            $validator = new Boolean($valueToValidate, $options);
        } else if ($normalizedName === self::VALIDATOR_URL) {
            $validator = new Url($valueToValidate, $options);
        } else if ($normalizedName === self::VALIDATOR_CSS_SELECTOR) {
            $validator = new CssSelector($valueToValidate, $options);
        } else if ($normalizedName === self::VALIDATOR_ENUM) {
            $validator = new Enum($valueToValidate, $options);
        } else if ($normalizedName === self::VALIDATOR_DATA_TYPE) {
            $validator = new DataType($valueToValidate, $options);
	} else if ($normalizedName === self::VALIDATOR_EMAL) {
	    $validator = new Email($valueToValidate, $options);
	} else {
	    $validator = new Validator($valueToValidate, $options);
	}

        return $validator;
    }

}
