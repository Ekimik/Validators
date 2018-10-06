<?php

namespace Ekimik\Validators\Tests;

use \Ekimik\Validators\StringBase;

/**
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

        $validator = new StringBase(NULL, [StringBase::OPTION_REQUIRED => FALSE]);
        $this->assertTrue($validator->validate());

        $validator = new StringBase(1);
        $this->assertFalse($validator->validate());

        $validator = new StringBase(['barbar']);
        $this->assertFalse($validator->validate());

        $validator = new StringBase('<? php echo 1; ?>');
        $this->assertFalse($validator->validate());
    }
}
