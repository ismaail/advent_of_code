<?php

namespace PuzzleTest\Day6;

use Puzzle\Day6\Light;
use Puzzle\Day6\LightGrid;

class LightGridTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var LightGrid
     */
    private $grid;

    protected function setUp()
    {
        parent::setUp();

        $this->grid = new LightGrid();
    }

    public function test_lightgrid_inherit_basegrid()
    {
        $this->assertInstanceOf(\Puzzle\BaseGrid::class, $this->grid);
    }

    public function test_init_empty_grid()
    {
        $this->assertEmpty($this->grid);
    }

    public function test_add_light_to_the_grid()
    {
        $light = new Light();

        $this->grid['0,0'] = $light;

        $this->assertCount(1, $this->grid);

        $this->assertInstanceOf(Light::class, $this->grid['0,0']);
    }

    public function test_add_value_to_grid_throw_exception_if_wrong_offset()
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->grid['00'] = new Light();;
    }

    public function test_add_value_to_grid_throw_exception_if_wrong_value()
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->grid['0,0'] = 'Non Light class instance';
    }

    public function test_light_isset_in_the_grid()
    {
        $light = new Light();

        $this->grid['0,0'] = $light;

        $this->assertTrue(isset($this->grid['0,0']));
    }

    public function test_remove_light_from_grid()
    {
        $light = new Light();

        $this->grid['0,0'] = $light;

        $this->assertCount(1, $this->grid);

        unset($this->grid['0,0']);

        $this->assertEmpty($this->grid);
    }

    public function test_get_value_in_this_offset()
    {
        $light = new Light();
        $this->grid['0,0'] = $light;

        $this->assertCount(1, $this->grid);

        $value = $this->grid->offsetGetOrCreate('0,0');

        $this->assertInstanceOf(Light::class, $value);
    }

    public function test_get_value_in_this_offset_or_create_new_one()
    {
        $this->assertEmpty($this->grid);

        $value = $this->grid->offsetGetOrCreate('0,0');

        $this->assertInstanceOf(Light::class, $value);
    }

    public function test_setup_lights()
    {
        $this->assertEmpty($this->grid);

        $this->grid->setUpLights([0,0], [2,2], LightGrid::LIGHT_ACTION_TURN_ON);

        $this->assertCount(9, $this->grid);
    }

    public function test_setup_lights_throw_exception_if_wrong_position()
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->grid->setUpLights([0,4], [2,2], LightGrid::LIGHT_ACTION_TURN_ON);
    }

    public function test_setup_lights_on()
    {
        $this->grid->setUpLights([0,0], [2,2], LightGrid::LIGHT_ACTION_TURN_ON);

        $this->assertCount(9, $this->grid);
    }

    public function test_setup_lights_off()
    {
        $this->grid->setUpLights([0,0], [2,2], LightGrid::LIGHT_ACTION_TURN_OFF);

        $this->assertCount(9, $this->grid);
    }

    public function test_setup_lights_toggle()
    {
        $this->grid->setUpLights([0,0], [2,2], LightGrid::LIGHT_ACTION_TOGGLE);

        $this->assertCount(9, $this->grid);
    }

    public function test_light_action_on()
    {
        $reflectedMethod =  new \ReflectionMethod(LightGrid::class, 'activate');
        $reflectedMethod->setAccessible(true);

        $light = new Light();
        $reflectedMethod->invokeArgs($this->grid, [$light, 'turn on']);

        $this->assertEquals(1, $light->getBrightness());
    }

    public function test_light_action_off()
    {
        $reflectedMethod =  new \ReflectionMethod(LightGrid::class, 'activate');
        $reflectedMethod->setAccessible(true);

        $light = new Light();
        $reflectedMethod->invokeArgs($this->grid, [$light, 'turn off']);

        $this->assertEquals(0, $light->getBrightness());
    }

    public function test_light_action_toggle()
    {
        $reflectedMethod =  new \ReflectionMethod(LightGrid::class, 'activate');
        $reflectedMethod->setAccessible(true);

        $light = new Light();
        $reflectedMethod->invokeArgs($this->grid, [$light, 'toggle']);

        $this->assertEquals(2, $light->getBrightness());

    }
}
