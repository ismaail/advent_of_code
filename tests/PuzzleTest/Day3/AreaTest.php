<?php

namespace PuzzleTest\Day3;

use Puzzle\Day3\Area;
use Puzzle\Day3\House;

class AreaTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Area
     */
    private $area;

    public function setUp()
    {
        $this->area = new Area();
    }

    public function test_area_init_empty_houses()
    {

        $this->assertEmpty($this->area);
    }

    public function test_add_house()
    {
        $house = new House();

        $this->area['0,0'] = $house;

        $this->assertCount(1, $this->area);
    }

    public function test_set_trow_exception_if_not_house_instance()
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->area[] = 'Not a house instance';
    }

    /**
     * @param bool $expected
     * @param string $offset
     *
     * @dataProvider getOffsets
     */
    public function test_is_valid_offset($expected, $offset)
    {
        $reflectedMethod = new \ReflectionMethod(Area::class, 'isOffsetValid');
        $reflectedMethod->setAccessible(true);

        $this->assertEquals($expected, $reflectedMethod->invoke($this->area, $offset));
    }

    public function test_area_dont_accept_non_hous_instance_value()
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->area['0,0'] = 'Not House instance class';
    }

    public function test_area_unset_offset()
    {
        $this->area['0,0'] = new House();

        $this->assertCount(1, $this->area);
        $this->assertArrayHasKey('0,0', $this->area);

        unset($this->area['0,0']);

        $this->assertArrayNotHasKey('0,0', $this->area);
//        $this->assertEmpty($this->area);
    }

    /**
     * @return array
     */
    public function getOffsets()
    {
        return [
            [false, 1],
            [true, '0,0'],
            [true, '1,3'],
            [true, '-2,0'],
            [true, '1,-4'],
            [true, '-3,-7'],
            [false, '12'],
            [false, '-3-7'],
            [false, 'foo,bar'],
        ];
    }
}
