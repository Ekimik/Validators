<?php

namespace Ekimik\Validators;

/**
 * Validator for season
 *
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik/Validators
 */
class Season extends StringWithSeparator {

    const OPTION_ONE_YEAR_SEASON = 'oneYearSeason';

    protected function validateValue(): bool {
        $result = parent::validateValue();
        if ($result === FALSE) {
            return FALSE;
        }

        $val = $this->getValueToValidate();
        $separator = $this->getOption(self::OPTION_SEPARATOR);
        $seasonParts = explode($separator, $val);
        $result = $this->isNumericPartsValid($seasonParts, 2);

        if ($result) {
            $result = $this->isSeasonPartsValid($seasonParts);
        }

        return $result;
    }

    protected function getDefaultOptions(): array {
        $options = parent::getDefaultOptions();
        $options[self::OPTION_SEPARATOR] = '/';
        $options[self::OPTION_ONE_YEAR_SEASON] = FALSE;

        return $options;
    }

    private function isSeasonPartsValid($parts): bool {
        $isOneYearSeason = $this->getOption(self::OPTION_ONE_YEAR_SEASON);
        if ($isOneYearSeason && $parts[0] == $parts[1]) {
            return TRUE;
        }

        if (!$isOneYearSeason && $parts[0] < $parts[1] && $parts[1] - $parts[0] === 1) {
            return TRUE;
        }

        return FALSE;
    }

}
