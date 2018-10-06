<?php

namespace Ekimik\Validators\Tests;

use \Ekimik\Validators\Url;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik\Validators
 */
class UrlTest extends \PHPUnit\Framework\TestCase {

    /**
     * @covers Url::validate
     */
    public function testValidate() {
        $validator = new Url('foo');
        $this->assertFalse($validator->validate());

        $validator = new Url('foo', [Url::OPTION_REQUIRED => FALSE]);
        $this->assertFalse($validator->validate());

        $validator = new Url(NULL, [Url::OPTION_REQUIRED => FALSE]);
        $this->assertTrue($validator->validate());

        $validator = new Url('http://www.example.com');
        $this->assertTrue($validator->validate());

        $validator = new Url('www.example.com', [Url::OPTION_FULLY_QUALIFIED => FALSE]);
        $this->assertTrue($validator->validate());

        $validator = new Url('www.example.com');
        $this->assertFalse($validator->validate());
    }

}
