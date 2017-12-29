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
     * @param bool $valueRequired
     * @param array $cfgOpts
     * @return IValidator
     */
    public function getValidator(string $name, $valueToValidate, bool $valueRequired = TRUE, array $cfgOpts = []): IValidator {
        $normalizedName = Strings::lower($name);

        $validator = NULL;
        if ($normalizedName === self::VALIDATOR_DATE) {
            $validator = new Date();
        } else if ($normalizedName === self::VALIDATOR_TIME) {
            $validator = new Time();
        } else if ($normalizedName === self::VALIDATOR_STRING) {
            $validator = new StringBase();
        } else if ($normalizedName === self::VALIDATOR_SCORE) {
            $validator = new Score();
        } else if ($normalizedName === self::VALIDATOR_SEASON) {
            $validator = new Season();
        } else if ($normalizedName === self::VALIDATOR_BOOL) {
            $validator = new Boolean();
        } else if ($normalizedName === self::VALIDATOR_URL) {
            $validator = new Url();
        } else if ($normalizedName === self::VALIDATOR_CSS_SELECTOR) {
            $validator = new CssSelector();
        } else if ($normalizedName === self::VALIDATOR_ENUM) {
            $validator = new Enum();
        } else if ($normalizedName === self::VALIDATOR_DATA_TYPE) {
            $validator = new DataType();
	} else if ($normalizedName === self::VALIDATOR_EMAL) {
	    $validator = new Email();
	} else {
	    $validator = new Validator();
	}

	$validator->setValueToValidate($valueToValidate);
        $validator->setRequired($valueRequired);
        $validator->configureValidator($cfgOpts);

        return $validator;
    }

}
