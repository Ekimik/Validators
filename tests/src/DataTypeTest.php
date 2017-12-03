<?php

namespace Ekimik\Validators\Tests;

use \Ekimik\Validators\DataType;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik\Validators
 */
class DataTypeTest extends \PHPUnit_Framework_TestCase {

    /**
     * @covers DataType::validate
     */
    public function testValidate() {
	$validator = new DataType('foo');
	$validator->setExpectedType('string');
	$this->assertTrue($validator->validate());

	$validator->setExpectedType('int');
	$this->assertFalse($validator->validate());

	$validator = new DataType('123');
	$validator->setExpectedType('integer');
	$this->assertTrue($validator->validate());
	$validator->setExpectedType('float');
	$this->assertTrue($validator->validate());

	$validator = new DataType('123.2');
	$validator->setExpectedType('integer');
	$this->assertFalse($validator->validate());

	$validator = new DataType(456);
	$validator->setExpectedType('float');
	$this->assertTrue($validator->validate());

	$validator = new DataType(FALSE);
	$validator->setExpectedType('bool');
	$this->assertTrue($validator->validate());
	$validator->setExpectedType('array');
	$this->assertFalse($validator->validate());
    }

}
