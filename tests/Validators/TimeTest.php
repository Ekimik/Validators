<?php

namespace Ekimik\Validators\Tests;

use \Ekimik\Validators\Time;

/**
 * Testcase for time validator
 *
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik
 */
class TimeTest extends \PHPUnit_Framework_TestCase {

    /**
     * @covers TimeValidator::validator
     */
    public function testValidate() {
        $validator = new Time('15:00');
        $this->assertTrue($validator->validate());

        $validator = new Time('14:00:00');
        $this->assertTrue($validator->validate());

        $validator = new Time('17:30:20');
        $this->assertTrue($validator->validate());

        $validator = new Time('17-30-20', TRUE);
        $validator->configureValidator(['separator' => '-']);
        $this->assertTrue($validator->validate());

        $validator = new Time('17-30-20', TRUE);
        $validator->configureValidator(['separator' => '-']);
        $this->assertTrue($validator->validate());

        $validator = new Time(NULL, FALSE);
        $this->assertTrue($validator->validate());

        $validator = new Time('abc');
        $this->assertFalse($validator->validate());

        $validator = new Time('abc:def');
        $this->assertFalse($validator->validate());

        $validator = new Time('11:00-10', FALSE);
        $validator->configureValidator(['separator' => '-']);
        $this->assertFalse($validator->validate());

        $validator = new Time('11:00:101');
        $this->assertFalse($validator->validate());

        $validator = new Time(123);
        $this->assertFalse($validator->validate());

        $validator = new Time();
        $this->assertFalse($validator->validate());
    }

}
