<?php

namespace PuzzleTest\Day1;
use Puzzle\Day1\Elevator;

/**
 * Class ElevatorTest
 * @package PuzzleTest\Day1
 */
class ElevatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Elevator
     */
    private $elevator;

    public function setUp()
    {
        parent::setUp();

        $this->elevator = new Elevator();
    }

    public function test_elevator_instance()
    {
        $this->assertInstanceOf(Elevator::class, $this->elevator);
    }

    public function test_current_floor()
    {
        $this->assertSame(0, $this->elevator->getFloor(), 'Wrong current Floor value');
    }

    public function test_go_up()
    {
        $this->elevator->goUp();

        $this->assertSame(1, $this->elevator->getFloor());
    }

    public function test_go_down()
    {
        $this->elevator->goDown();

        $this->assertSame(-1, $this->elevator->getFloor());
    }

    public function test_is_basement_init_false()
    {
        $this->assertFalse($this->elevator->isBasement());
    }

    public function test_is_basement_is_true_after_working_elevator()
    {
        $this->elevator->goUp();
        $this->elevator->goDown();
        $this->elevator->goDown();

        $this->assertTrue($this->elevator->isBasement());
    }

    public function test_is_basement_is_false_after_working_elevator()
    {
        $this->elevator->goUp();
        $this->elevator->goDown();
        $this->elevator->goDown();
        $this->elevator->goDown();

        $this->assertFalse($this->elevator->isBasement());
    }
}
