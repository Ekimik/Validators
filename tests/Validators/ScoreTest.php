<?php

namespace Ekimik\Validators\Tests;

use \Ekimik\Validators\Score;

/**
 * Testcase for score validator
 *
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik
 */
class ScoreTest extends \PHPUnit_Framework_TestCase {

    /**
     * @covers ScoreValidator::validate
     */
    public function testValidate() {
        $validator = new Score('1-1');
        $this->assertTrue($validator->validate());

        $validator = new Score('15-49');
        $this->assertTrue($validator->validate());

        $validator = new Score('5:1', TRUE, ':');
        $validator->configureValidator(['separator' => ':']);
        $this->assertTrue($validator->validate());

        $validator = new Score('', FALSE);
        $this->assertTrue($validator->validate());

        $validator = new Score('1-');
        $this->assertFalse($validator->validate());

        $validator = new Score('15-101');
        $this->assertFalse($validator->validate());

        $validator = new Score(1);
        $this->assertFalse($validator->validate());

        $validator = new Score('1:1');
        $this->assertFalse($validator->validate());

        $validator = new Score();
        $this->assertFalse($validator->validate());
    }

}
