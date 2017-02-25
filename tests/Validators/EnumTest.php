<?php

namespace Ekimik\Validators\Tests;

use \Ekimik\Validators\Enum;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package  Ekimik\Validators
 */
class EnumTest extends \PHPUnit_Framework_TestCase {

    /**
     * @covers Enum::validate
     */
    public function testValidate() {
	$validator = new Enum('foo', TRUE);
	$validator->configureValidator(['availableOptions' => ['foo', 'bar']]);
	$this->assertTrue($validator->validate());

	$validator = new Enum(123, TRUE);
	$validator->configureValidator(['availableOptions' => ['foo', 'bar', 123]]);
	$this->assertTrue($validator->validate());

	$validator = new Enum('baz', TRUE);
	$validator->configureValidator(['availableOptions' => ['foo', 'bar']]);
	$this->assertFalse($validator->validate());

	$validator = new Enum(['foo'], TRUE);
	$validator->configureValidator(['availableOptions' => ['foo', 'bar']]);
	$this->assertFalse($validator->validate());

    }

}
