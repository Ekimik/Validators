<?php

namespace Ekimik\Validators\Tests;

use \Ekimik\Validators\Season;

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
        $validator = new Season('2015/2016');
        $this->assertTrue($validator->validate());

        $validator = new Season('2016-2017', FALSE, '-');
        $validator->configureValidator(['separator' => '-']);
        $this->assertTrue($validator->validate());

        $validator = new Season('', FALSE, '-');
        $validator->configureValidator(['separator' => '-']);
        $this->assertTrue($validator->validate());

        $validator = new Season('2015-2016');
        $this->assertFalse($validator->validate());

        $validator = new Season('2015/2014');
        $this->assertFalse($validator->validate());

        $validator = new Season('2017/2017');
        $this->assertFalse($validator->validate());

        $validator = new Season('2017/2020');
        $this->assertFalse($validator->validate());

        $validator = new Season(2017);
        $this->assertFalse($validator->validate());

        $validator = new Season('2016', TRUE);
        $this->assertFalse($validator->validate());

        $validator = new Season();
        $this->assertFalse($validator->validate());
    }

}
