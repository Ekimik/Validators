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
	$validator = new DataType('foo', [DataType::OPTION_DATA_TYPE => 'string']);
	$this->assertTrue($validator->validate());

	$validator = new DataType('foo', [DataType::OPTION_DATA_TYPE => 'int']);
	$this->assertFalse($validator->validate());

	$validator = new DataType('123', [DataType::OPTION_DATA_TYPE => 'integer']);
	$this->assertTrue($validator->validate());

	$validator = new DataType('123', [DataType::OPTION_DATA_TYPE => 'float']);
	$this->assertTrue($validator->validate());

	$validator = new DataType('123.2', [DataType::OPTION_DATA_TYPE => 'integer']);
	$this->assertFalse($validator->validate());

	$validator = new DataType(456, [DataType::OPTION_DATA_TYPE => 'float']);
	$this->assertTrue($validator->validate());

	$validator = new DataType(FALSE, [DataType::OPTION_DATA_TYPE => 'bool']);
	$this->assertTrue($validator->validate());

	$validator = new DataType(FALSE, [DataType::OPTION_DATA_TYPE => 'array']);
	$this->assertFalse($validator->validate());
    }

}
