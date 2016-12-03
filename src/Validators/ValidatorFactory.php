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

    /**
     * @param string $name
     * @param mixed $valueToValidate
     * @param boolean $valueRequired
     * @param string|null $sep - separator, @see StringWithSeparatorValidator
     * @return IValidator
     */
    public function getValidator($name, $valueToValidate, $valueRequired = TRUE, $sep = NULL) {
        $normalizedName = Strings::lower($name);

        $validator = NULL;
        if ($normalizedName === self::VALIDATOR_DATE) {
            $validator = new DateValidator();
        } else if ($normalizedName === self::VALIDATOR_TIME) {
            $validator = new TimeValidator();
        } else if ($normalizedName === self::VALIDATOR_STRING) {
            $validator = new StringValidator();
        } else if ($normalizedName === self::VALIDATOR_SCORE) {
            $validator = new ScoreValidator();
        } else if ($normalizedName === self::VALIDATOR_SEASON) {
            $validator = new SeasonValidator();
        } else {
            $validator = new Validator();
        }

        $validator->setValueToValidate($valueToValidate);
        $validator->setRequired($valueRequired);
        if ($validator instanceof StringWithSeparatorValidator) {
            $validator->setSeparator($sep);
        }

        return $validator;
    }

}
