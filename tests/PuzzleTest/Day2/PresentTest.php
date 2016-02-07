<?php

namespace PuzzleTest\Day2;

use Puzzle\Day2\Present;

class PresentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Present
     */
    private $present;

    public function setUp()
    {
        parent::setUp();

        $this->present = new Present();
    }

    public function test_present_instance()
    {
        $this->assertInstanceOf(Present::class, $this->present);
    }

    /**
     * @param array $expected
     * @param array $input
     *
     * @dataProvider getDimensions
     */
    public function test_calculate_paper_area($expected, $input)
    {
        $area = $this->present->getArea($input);

        $this->assertEquals($expected['area'], $area, 'Wrong calculated area value');
    }

    /**
     * @param array $expected
     * @param array $input
     *
     * @dataProvider getDimensions
     */
    public function test_calculate_ribbon($expected, $input)
    {
        $ribbon = $this->present->getRibbon($input);

        $this->assertEquals($expected['ribbon'], $ribbon, 'Wrong calculated ribbon value');
    }

    public function getDimensions()
    {
        return [
            [
                ['area' => 43, 'ribbon' => 14],
                [ 1, 10, 1 ]
            ],
            [
                ['area' => 58, 'ribbon' => 34],
                [ 4, 2, 3 ]
            ],
        ];
    }
}
