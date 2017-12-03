<?php

namespace Ekimik\Validators\Tests;

use \Ekimik\Validators\Date;

/**
 * Testcase for date validator
 *
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik\Validators
 */
class DateTest extends \PHPUnit_Framework_TestCase {

    /**
     * @covers Date::validate
     */
    public function testValidate() {
        $validator = new Date('2016-05-11');
        $this->assertTrue($validator->validate());

        $validator = new Date('15.11.2016', FALSE, '.');
        $validator->configureValidator(['separator' => '.']);
        $this->assertTrue($validator->validate());

        $validator = new Date(NULL, FALSE);
        $this->assertTrue($validator->validate());

        $validator = new Date(123);
        $this->assertFalse($validator->validate());

        $validator = new Date();
        $this->assertFalse($validator->validate());

        $validator = new Date('abc-def');
        $this->assertFalse($validator->validate());

        $validator = new Date('66-def');
        $this->assertFalse($validator->validate());

        $validator = new Date('2016-66-77');
        $this->assertFalse($validator->validate());
    }

}
