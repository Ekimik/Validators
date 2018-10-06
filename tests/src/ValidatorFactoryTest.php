<?php

namespace Ekimik\Validators\Tests;

use \Ekimik\Validators\ValidatorFactory;
use \Ekimik\Validators;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik\Validators
 */
class ValidatorFactoryTest extends \PHPUnit\Framework\TestCase {

    /**
     * @covers ValidatorFactory::getValidator
     */
    public function testGetValidator() {
        $factory = new ValidatorFactory();

        $validator = $factory->create('foo', 'bar');
        $this->assertInstanceOf(Validators\Validator::class, $validator);
        $this->assertTrue($validator->getOption(Validators\Validator::OPTION_REQUIRED));
        $this->assertEquals('bar', $validator->getValueToValidate());

	$options = [
	    Validators\Date::OPTION_REQUIRED => FALSE,
	    Validators\Date::OPTION_SEPARATOR => '-',
	];
	$validator = $factory->create(ValidatorFactory::VALIDATOR_DATE, 'baz', $options);
        $this->assertInstanceOf(Validators\Date::class, $validator);
        $this->assertFalse($validator->getOption(Validators\Date::OPTION_REQUIRED));
        $this->assertEquals('-', $validator->getOption(Validators\Date::OPTION_SEPARATOR));
        $this->assertEquals('baz', $validator->getValueToValidate());
    }

}
