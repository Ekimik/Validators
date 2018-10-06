<?php

namespace Ekimik\Validators\Tests;

use \Ekimik\Validators\Boolean;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik\Validators
 */
class BooleanTest extends \PHPUnit\Framework\TestCase {

    /**
     * @covers BooleanValidator::validate
     */
    public function testValidate() {
        $validator = new Boolean(TRUE);
        $this->assertTrue($validator->validate());

	$validator = new Boolean(FALSE, [Boolean::OPTION_REQUIRED => FALSE]);
	$this->assertTrue($validator->validate());

        $validator = new Boolean(1);
        $this->assertTrue($validator->validate());

        $validator = new Boolean(0);
        $this->assertTrue($validator->validate());

        $validator = new Boolean('1');
        $this->assertTrue($validator->validate());

        $validator = new Boolean('0');
        $this->assertTrue($validator->validate());

        $validator = new Boolean('', [Boolean::OPTION_REQUIRED => FALSE]);
        $this->assertTrue($validator->validate());

        $validator = new Boolean('');
        $this->assertFalse($validator->validate());

        $validator = new Boolean('abcd');
        $this->assertFalse($validator->validate());

        $validator = new Boolean(NULL);
        $this->assertFalse($validator->validate());
    }

}
