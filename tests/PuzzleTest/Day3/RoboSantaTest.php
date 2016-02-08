<?php

namespace PuzzleTest\Day3;

use Puzzle\Day3\RoboSanta;

class RoboSantaTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var RoboSanta
     */
    private $roboSanta;

    public function setUp()
    {
        parent::setUp();

        $this->roboSanta = new RoboSanta();
    }

    public function test_init_position()
    {
        $this->assertSame(0, $this->roboSanta->getPositionX(), 'Wrong X position');
        $this->assertSame(0, $this->roboSanta->getPositionY(), 'Wrong Y position');
    }

    /**
     * @group failing
     */
    public function test_move_north()
    {
        $this->roboSanta->moveNorth();

        $this->assertSame(0, $this->roboSanta->getPositionX(), 'Wrong X position');
        $this->assertSame(1, $this->roboSanta->getPositionY(), 'Wrong Y position');
    }

    public function test_move_south()
    {
        $this->roboSanta->moveSouth();

        $this->assertSame(0, $this->roboSanta->getPositionX(), 'Wrong X position');
        $this->assertSame(-1, $this->roboSanta->getPositionY(), 'Wrong Y position');
    }

    public function test_move_west()
    {
        $this->roboSanta->moveWest();

        $this->assertSame(-1, $this->roboSanta->getPositionX(), 'Wrong X position');
        $this->assertSame(0, $this->roboSanta->getPositionY(), 'Wrong Y position');
    }

    public function test_move_east()
    {
        $this->roboSanta->moveEast();

        $this->assertSame(1, $this->roboSanta->getPositionX(), 'Wrong X position');
        $this->assertSame(0, $this->roboSanta->getPositionY(), 'Wrong Y position');
    }
}
