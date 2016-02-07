<?php

namespace PuzzleTest\Day3;

use Puzzle\Day3\House;

class HouseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var House
     */
    private $house;

    public function setUp()
    {
        parent::setUp();

        $this->house = new House();
    }

    public function test_init_number_of_present()
    {
        $this->assertSame(0, $this->house->countPresents());
    }

    public function test_receive_present()
    {
        $this->house->givePresent();

        $this->assertSame(1, $this->house->countPresents());
    }
}
