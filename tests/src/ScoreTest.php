<?php

namespace Ekimik\Validators\Tests;

use \Ekimik\Validators\Score;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik
 */
class ScoreTest extends \PHPUnit\Framework\TestCase {

    /**
     * @covers ScoreValidator::validate
     */
    public function testValidate() {
        $validator = new Score('1-1');
        $this->assertTrue($validator->validate());

        $validator = new Score('15-49');
        $this->assertTrue($validator->validate());

        $validator = new Score('5:1', [Score::OPTION_SEPARATOR => ':']);
        $this->assertTrue($validator->validate());

        $validator = new Score('', [Score::OPTION_REQUIRED => FALSE]);
        $this->assertTrue($validator->validate());

        $validator = new Score('1-');
        $this->assertFalse($validator->validate());

        $validator = new Score('15-101');
        $this->assertFalse($validator->validate());

        $validator = new Score(1);
        $this->assertFalse($validator->validate());

        $validator = new Score('1:1');
        $this->assertFalse($validator->validate());
    }

}
