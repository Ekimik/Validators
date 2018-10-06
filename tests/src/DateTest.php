<?php

namespace Ekimik\Validators\Tests;

use \Ekimik\Validators\Date;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik\Validators
 */
class DateTest extends \PHPUnit\Framework\TestCase {

    /**
     * @covers Date::validate
     */
    public function testValidate() {
        $validator = new Date('2016-05-11');
        $this->assertTrue($validator->validate());

	$options = [
	    Date::OPTION_REQUIRED => FALSE,
	    Date::OPTION_SEPARATOR => '.',
	];
        $validator = new Date('15.11.2016', $options);
        $this->assertTrue($validator->validate());

        $validator = new Date(NULL, [Date::OPTION_REQUIRED => FALSE]);
        $this->assertTrue($validator->validate());

        $validator = new Date(123);
        $this->assertFalse($validator->validate());

        $validator = new Date('abc-def');
        $this->assertFalse($validator->validate());

        $validator = new Date('66-def');
        $this->assertFalse($validator->validate());

        $validator = new Date('2016-66-77');
        $this->assertFalse($validator->validate());
    }

}
