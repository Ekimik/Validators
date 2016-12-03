<?php

namespace Ekimik\Validators\Tests;

use \Ekimik\Validators\Validator;

/**
 * Test case for base validator
 *
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik
 */
class ValidatorTest extends \PHPUnit_Framework_TestCase {

    /**
     * @covers Validator::isNumericPartsValid()
     */
    public function testIsNumericPartsValid() {
        $validator = new Validator();

        $parts = ['foo', 'bar'];
        $this->assertFalse($validator->isNumericPartsValid($parts, 2));

        $parts = ['987', '654', 'baz'];
        $this->assertFalse($validator->isNumericPartsValid($parts, 3));

        $parts = ['123', '456'];
        $this->assertFalse($validator->isNumericPartsValid($parts, 3));

        $parts = ['123', '456', 789];
        $this->assertTrue($validator->isNumericPartsValid($parts, 3));

        $parts = [123, 456];
        $this->assertTrue($validator->isNumericPartsValid($parts, 2));
    }

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

        $validator = new Validator(NULL, FALSE);
        $this->assertTrue($validator->validate());

        $validator = new Validator();
        $this->assertFalse($validator->validate());

        $validator = new Validator([]);
        $this->assertFalse($validator->validate());
    }

}
