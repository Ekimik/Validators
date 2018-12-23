<?php

namespace Ekimik\Validators\Tests;

use \Ekimik\Validators\Validator;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik\Validators
 */
class ValidatorTest extends \PHPUnit\Framework\TestCase {

    /**
     * @covers Validator::validate
     */
    public function testValidate() {
        $validator = new Validator('foo');
        $this->assertTrue($validator->validate());

        $validator = new Validator(123);
        $this->assertTrue($validator->validate());

        $validator = new Validator(['bar']);
        $this->assertTrue($validator->validate());

        $validator = new Validator(NULL, [Validator::OPTION_REQUIRED => FALSE]);
        $this->assertTrue($validator->validate());

        $validator = new Validator([]);
        $this->assertFalse($validator->validate());
    }

    /**
     * @covers Validator
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Unknown options foo|bar
     */
    public function testValidatorWrongConfig() {
        new Validator(NULL, ['foo' => 123, 'bar' => 'baz', Validator::OPTION_REQUIRED => FALSE]);
    }

}
