<?php

namespace Ekimik\Validators\Tests;

use \Ekimik\Validators\CssSelector;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik\Validators
 */
class CssSelectorTest extends \PHPUnit_Framework_TestCase {

    /**
     * @covers CssSelector::validate
     */
    public function testValidate() {
        $validator = new CssSelector('#container table.some_class');
        $this->assertTrue($validator->validate());

        $validator = new CssSelector('a.container:hover');
        $this->assertTrue($validator->validate());

        $validator = new CssSelector('a[href="foo"]');
        $this->assertFalse($validator->validate());

        $validator = new CssSelector('<script>');
        $this->assertFalse($validator->validate());
    }

}
