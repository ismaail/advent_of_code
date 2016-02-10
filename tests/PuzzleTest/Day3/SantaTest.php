<?php

namespace PuzzleTest\Day3;

use Puzzle\Day3\Santa;

class SantaTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Santa
     */
    private $santa;

    public function setUp()
    {
        parent::setUp();

        $this->santa = new Santa();
    }

    public function test_init_position()
    {
        $this->assertSame(0, $this->santa->getPositionX(), 'Wrong X position');
        $this->assertSame(0, $this->santa->getPositionY(), 'Wrong Y position');
    }

    public function test_move_north()
    {
        $this->santa->moveNorth();

        $this->assertSame(0, $this->santa->getPositionX(), 'Wrong X position');
        $this->assertSame(1, $this->santa->getPositionY(), 'Wrong Y position');
    }

    public function test_move_south()
    {
        $this->santa->moveSouth();

        $this->assertSame(0, $this->santa->getPositionX(), 'Wrong X position');
        $this->assertSame(-1, $this->santa->getPositionY(), 'Wrong Y position');
    }

    public function test_move_west()
    {
        $this->santa->moveWest();

        $this->assertSame(-1, $this->santa->getPositionX(), 'Wrong X position');
        $this->assertSame(0, $this->santa->getPositionY(), 'Wrong Y position');
    }

    public function test_move_east()
    {
        $this->santa->moveEast();

        $this->assertSame(1, $this->santa->getPositionX(), 'Wrong X position');
        $this->assertSame(0, $this->santa->getPositionY(), 'Wrong Y position');
    }
}
