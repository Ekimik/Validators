<?php

namespace Ekimik\Validators;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik/Validators
 */
class Score extends StringWithSeparator {

    protected function validateValue(): bool {
        $result = parent::validateValue();
        if ($result === FALSE) {
            return FALSE;
        }

        $val = $this->getValueToValidate();
	$separator = $this->getOption(self::OPTION_SEPARATOR);
        $scoreParts = explode($separator, $val);
        return $this->isScorePartsValid($scoreParts);
    }

    protected function getDefaultOptions(): array {
	$options = parent::getDefaultOptions();
	$options[self::OPTION_SEPARATOR] = '-';

	return $options;
    }

    /**
     * @param array $parts
     * @return boolean
     */
    private function isScorePartsValid(Array $parts) {
	$isValid = $this->isNumericPartsValid($parts, 2);
	if (!$isValid) {
	    return $isValid;
	}

	$homeScore = $parts[0];
	$awayScore = $parts[1];
	if ($homeScore >= 0 && $homeScore < 50 && $awayScore >= 0 && $awayScore < 50) {
	    return TRUE;
	}

	return FALSE;
    }

}
