<?php

namespace Ekimik\Validators\Tests\Mocks;

use \Ekimik\Validators\Validator;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik\Validators
 */
class MockValidator extends Validator {

    protected $foo;
    protected $bar;

    public function getFoo() {
        return $this->foo;
    }

    public function getBar() {
        return $this->bar;
    }



}
