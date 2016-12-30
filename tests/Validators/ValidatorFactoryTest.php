<?php

namespace Ekimik\Validators\Tests;

use \Ekimik\Validators\ValidatorFactory,
    \Ekimik\Validators;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik\Validators
 */
class ValidatorFactoryTest extends \PHPUnit_Framework_TestCase {

    /**
     * @covers ValidatorFactory::getValidator
     */
    public function testGetValidator() {
        $factory = new ValidatorFactory();

        $validator = $factory->getValidator('foo', 'bar');
        $this->assertInstanceOf(Validators\Validator::class, $validator);
        $this->assertTrue($validator->isValueRequired());
        $this->assertEquals('bar', $validator->getValueToValidate());

        $validator = $factory->getValidator(ValidatorFactory::VALIDATOR_DATE, 'baz', FALSE, ['separator' => '-']);
        $this->assertInstanceOf(Validators\Date::class, $validator);
        $this->assertFalse($validator->isValueRequired());
        $this->assertEquals('baz', $validator->getValueToValidate());
        $this->assertEquals('-', $validator->getSeparator());

        $validator = $factory->getValidator(ValidatorFactory::VALIDATOR_TIME, 'barbar');
        $this->assertInstanceOf(Validators\Time::class, $validator);
        $this->assertTrue($validator->isValueRequired());
        $this->assertEquals('barbar', $validator->getValueToValidate());
        $this->assertEquals(':', $validator->getSeparator());

        $validator = $factory->getValidator(ValidatorFactory::VALIDATOR_STRING, 'trolol', FALSE);
        $this->assertInstanceOf(Validators\StringBase::class, $validator);
        $this->assertFalse($validator->isValueRequired());
        $this->assertEquals('trolol', $validator->getValueToValidate());

        $validator = $factory->getValidator('SCORE', '1:4');
        $this->assertInstanceOf(Validators\Score::class, $validator);
        $this->assertTrue($validator->isValueRequired());
        $this->assertEquals('1:4', $validator->getValueToValidate());
        $this->assertEquals('-', $validator->getSeparator());

        $validator = $factory->getValidator(ValidatorFactory::VALIDATOR_SEASON, '2015/2016', FALSE, ['separator' => '::']);
        $this->assertInstanceOf(Validators\Season::class, $validator);
        $this->assertFalse($validator->isValueRequired());
        $this->assertEquals('2015/2016', $validator->getValueToValidate());
        $this->assertEquals('::', $validator->getSeparator());

        $validator = $factory->getValidator(ValidatorFactory::VALIDATOR_URL, 'value');
        $this->assertInstanceOf(Validators\Url::class, $validator);
        $this->assertTrue($validator->isValueRequired());
        $this->assertEquals('value', $validator->getValueToValidate());

        $validator = $factory->getValidator(ValidatorFactory::VALIDATOR_BOOL, TRUE);
        $this->assertInstanceOf(Validators\Boolean::class, $validator);
        $this->assertTrue($validator->isValueRequired());
        $this->assertTrue($validator->getValueToValidate());

        $validator = $factory->getValidator(ValidatorFactory::VALIDATOR_CSS_SELECTOR, '#container');
        $this->assertInstanceOf(Validators\CssSelector::class, $validator);
        $this->assertTrue($validator->isValueRequired());
        $this->assertEquals('#container', $validator->getValueToValidate());
    }

}
