<?php

namespace Ekimik\Validators\Tests;

use \Ekimik\Validators\DateValidator;

/**
 * Testcase for date validator
 *
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik
 */
class DateValidatorTest extends \PHPUnit_Framework_TestCase {

    /**
     * @covers DateValidator::validate
     */
    public function testValidate() {
        $validator = new DateValidator('2016-05-11');
        $this->assertTrue($validator->validate());

        $validator = new DateValidator('15.11.2016', FALSE, '.');
        $this->assertTrue($validator->validate());

        $validator = new DateValidator(NULL, FALSE);
        $this->assertTrue($validator->validate());

        $validator = new DateValidator();
        $this->assertFalse($validator->validate());

        $validator = new DateValidator('abc-def');
        $this->assertFalse($validator->validate());

        $validator = new DateValidator('66-def');
        $this->assertFalse($validator->validate());

        $validator = new DateValidator('2016-66-77');
        $this->assertFalse($validator->validate());

        $validator = new DateValidator(123);
        $this->assertFalse($validator->validate());
    }

}
