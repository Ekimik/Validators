<?php

namespace Ekimik\Validators\Tests;

use \Ekimik\Validators\TimeValidator;

/**
 * Testcase for time validator
 *
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik
 */
class TimeValidatorTest extends \PHPUnit_Framework_TestCase {

    /**
     * @covers TimeValidator::validator()
     */
    public function testValidate() {
        $validator = new TimeValidator('15:00');
        $this->assertTrue($validator->validate());

        $validator = new TimeValidator('14:00:00');
        $this->assertTrue($validator->validate());

        $validator = new TimeValidator('17:30:20');
        $this->assertTrue($validator->validate());

        $validator = new TimeValidator('17-30-20', TRUE, '-');
        $this->assertTrue($validator->validate());

        $validator = new TimeValidator('17-30-20', TRUE, '-');
        $this->assertTrue($validator->validate());

        $validator = new TimeValidator(NULL, FALSE);
        $this->assertTrue($validator->validate());

        $validator = new TimeValidator('abc');
        $this->assertFalse($validator->validate());

        $validator = new TimeValidator('abc:def');
        $this->assertFalse($validator->validate());

        $validator = new TimeValidator('11:00-10', FALSE, '-');
        $this->assertFalse($validator->validate());

        $validator = new TimeValidator('11:00:101');
        $this->assertFalse($validator->validate());

        $validator = new TimeValidator(123);
        $this->assertFalse($validator->validate());

        $validator = new TimeValidator();
        $this->assertFalse($validator->validate());
    }

}
