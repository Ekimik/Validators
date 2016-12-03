<?php

namespace Ekimik\Validators\Tests;

use \Ekimik\Validators\SeasonValidator;

/**
 * Testcase for season validator
 *
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik
 */
class SeasonValidatorTest extends \PHPUnit_Framework_TestCase {

    /**
     * @covers SeasonValidator::validate
     */
    public function testValidate() {
        $validator = new SeasonValidator('2015/2016');
        $this->assertTrue($validator->validate());

        $validator = new SeasonValidator('2016-2017', FALSE, '-');
        $this->assertTrue($validator->validate());

        $validator = new SeasonValidator('', FALSE, '-');
        $this->assertTrue($validator->validate());

        $validator = new SeasonValidator('2015-2016');
        $this->assertFalse($validator->validate());

        $validator = new SeasonValidator('2015/2014');
        $this->assertFalse($validator->validate());

        $validator = new SeasonValidator('2017/2017');
        $this->assertFalse($validator->validate());

        $validator = new SeasonValidator('2017/2020');
        $this->assertFalse($validator->validate());

        $validator = new SeasonValidator(2017);
        $this->assertFalse($validator->validate());

        $validator = new SeasonValidator('2016', TRUE);
        $this->assertFalse($validator->validate());

        $validator = new SeasonValidator();
        $this->assertFalse($validator->validate());
    }

}
