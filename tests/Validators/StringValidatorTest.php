<?php

namespace Ekimik\Validators\Tests;

use \Ekimik\Validators\StringValidator;

/**
 * Testcase for string validator
 *
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package \Ekimik
 */
class StringValidatorTest extends \PHPUnit_Framework_TestCase {

    /**
     * @covers StringValidator::validate
     */
    public function testValidate() {
        $validator = new StringValidator('Foobar');
        $this->assertTrue($validator->validate());

        $validator = new StringValidator('1.A třída (muži) - kraj Vysočina');
        $this->assertTrue($validator->validate());

        $validator = new StringValidator('Příliš žluťoučký kůň');
        $this->assertTrue($validator->validate());

        $validator = new StringValidator(NULL, FALSE);
        $this->assertTrue($validator->validate());

        $validator = new StringValidator(1);
        $this->assertFalse($validator->validate());

        $validator = new StringValidator(['barbar']);
        $this->assertFalse($validator->validate());

        $validator = new StringValidator();
        $this->assertFalse($validator->validate());
    }
}
