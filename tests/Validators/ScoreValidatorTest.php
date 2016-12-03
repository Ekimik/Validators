<?php

namespace Ekimik\Validators\Tests;

use \Ekimik\Validators\ScoreValidator;

/**
 * Testcase for score validator
 *
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik
 */
class ScoreValidatorTest extends \PHPUnit_Framework_TestCase {

    /**
     * @covers ScoreValidator::validate
     */
    public function testValidate() {
        $validator = new ScoreValidator('1-1');
        $this->assertTrue($validator->validate());

        $validator = new ScoreValidator('15-49');
        $this->assertTrue($validator->validate());

        $validator = new ScoreValidator('5:1', TRUE, ':');
        $this->assertTrue($validator->validate());

        $validator = new ScoreValidator('', FALSE);
        $this->assertTrue($validator->validate());

        $validator = new ScoreValidator('1-');
        $this->assertFalse($validator->validate());

        $validator = new ScoreValidator('15-101');
        $this->assertFalse($validator->validate());

        $validator = new ScoreValidator(1);
        $this->assertFalse($validator->validate());

        $validator = new ScoreValidator(['1-1']);
        $this->assertFalse($validator->validate());

        $validator = new ScoreValidator('1:1');
        $this->assertFalse($validator->validate());

        $validator = new ScoreValidator();
        $this->assertFalse($validator->validate());
    }

}
