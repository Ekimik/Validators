<?php

namespace Ekimik\Validators\Tests;

use \Ekimik\Validators\StringBase;

/**
 * Testcase for string validator
 *
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package \Ekimik
 */
class StringBaseTest extends \PHPUnit_Framework_TestCase {

    /**
     * @covers StringValidator::validate
     */
    public function testValidate() {
        $validator = new StringBase('Foobar');
        $this->assertTrue($validator->validate());

        $validator = new StringBase('1.A třída (muži) - kraj Vysočina');
        $this->assertTrue($validator->validate());

        $validator = new StringBase('Příliš žluťoučký kůň');
        $this->assertTrue($validator->validate());

        $validator = new StringBase(NULL, FALSE);
        $this->assertTrue($validator->validate());

        $validator = new StringBase(1);
        $this->assertFalse($validator->validate());

        $validator = new StringBase(['barbar']);
        $this->assertFalse($validator->validate());

        $validator = new StringBase();
        $this->assertFalse($validator->validate());

        $validator = new StringBase('<? php echo 1; ?>');
        $this->assertFalse($validator->validate());
    }
}
