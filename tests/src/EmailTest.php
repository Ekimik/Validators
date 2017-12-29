<?php

namespace Ekimik\Validators\Tests;

use Ekimik\Validators\Email;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik\Validators
 */
class EmailTest extends \PHPUnit_Framework_TestCase {

    /**
     * @covers Email
     */
    public function testEmail(){
	$validator = new Email('foo');
	$this->assertFalse($validator->validate());

	$validator = new Email(NULL, FALSE);
	$this->assertTrue($validator->validate());

	$validator = new Email('john.doe@email.cz', FALSE);
	$this->assertTrue($validator->validate());
    }

}
