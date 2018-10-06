<?php

namespace Ekimik\Validators\Tests;

use \Ekimik\Validators\Time;

/**
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

        $validator = new Time('17-30-20', [Time::OPTION_SEPARATOR => '-']);
        $this->assertTrue($validator->validate());

        $validator = new Time('17-30-20', [Time::OPTION_SEPARATOR => '-']);
        $this->assertTrue($validator->validate());

        $validator = new Time(NULL, [Time::OPTION_REQUIRED => FALSE]);
        $this->assertTrue($validator->validate());

        $validator = new Time('abc');
        $this->assertFalse($validator->validate());

        $validator = new Time('abc:def');
        $this->assertFalse($validator->validate());

	$options = [
	    Time::OPTION_REQUIRED => FALSE,
	    Time::OPTION_SEPARATOR => '-',
	];
        $validator = new Time('11:00-10', $options);
        $this->assertFalse($validator->validate());

        $validator = new Time('11:00:101');
        $this->assertFalse($validator->validate());

        $validator = new Time(123);
        $this->assertFalse($validator->validate());
    }

}
