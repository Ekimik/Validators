<?php

namespace Ekimik\Validators\Tests;

use \Ekimik\Validators\Season;

/**
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

	$options = [
	    Season::OPTION_REQUIRED => FALSE,
	    Season::OPTION_SEPARATOR => '-'
	];
	$validator = new Season('2016-2017', $options);
	$this->assertTrue($validator->validate());

	$options = [
	    Season::OPTION_REQUIRED => FALSE,
	    Season::OPTION_SEPARATOR => '-'
	];
	$validator = new Season('', $options);
	$this->assertTrue($validator->validate());

	$validator = new Season('2015-2016');
	$this->assertFalse($validator->validate());

	$validator = new Season('2015/2014');
	$this->assertFalse($validator->validate());

	$validator = new Season('2017/2017');
	$this->assertFalse($validator->validate());

	$validator = new Season('2017/2017', [Season::OPTION_ONE_YEAR_SEASON => TRUE]);
	$this->assertTrue($validator->validate());

	$validator = new Season('2017/2020');
	$this->assertFalse($validator->validate());

	$validator = new Season(2017);
	$this->assertFalse($validator->validate());

	$validator = new Season('2016');
	$this->assertFalse($validator->validate());
    }

}
