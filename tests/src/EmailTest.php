<?php

namespace Ekimik\Validators\Tests;

use Ekimik\Validators\Email;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik\Validators
 */
class EmailTest extends \PHPUnit\Framework\TestCase {

    /**
     * @covers Email
     */
    public function testEmail(){
	$validator = new Email('foo');
	$this->assertFalse($validator->validate());

	$validator = new Email(NULL, [Email::OPTION_REQUIRED => FALSE]);
	$this->assertTrue($validator->validate());

	$validator = new Email('john.doe@email.cz', [Email::OPTION_REQUIRED => FALSE]);
	$this->assertTrue($validator->validate());
    }

}
