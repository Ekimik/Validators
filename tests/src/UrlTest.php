<?php

namespace Ekimik\Validators\Tests;

use \Ekimik\Validators\Url;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik\Validators
 */
class UrlTest extends \PHPUnit_Framework_TestCase {

    /**
     * @covers Url::validate
     */
    public function testValidate() {
        $validator = new Url('foo');
        $this->assertFalse($validator->validate());

        $validator = new Url('foo', FALSE);
        $this->assertFalse($validator->validate());

        $validator = new Url(NULL, FALSE);
        $this->assertTrue($validator->validate());

        $validator = new Url('http://www.example.com');
        $this->assertTrue($validator->validate());

        $validator = new Url('www.example.com');
        $validator->configureValidator(['fullyQualifiedOnly' => FALSE]);
        $this->assertTrue($validator->validate());

        $validator = new Url('www.example.com');
        $this->assertFalse($validator->validate());
    }

}
