<?php

namespace PuzzleTest\Day6;

use Puzzle\Day6\Light;

class LightTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Light
     */
    private $light;

    protected function setUp()
    {
        parent::setUp();

        $this->light = new Light();
    }

    public function test_init_brightness()
    {
        $this->assertSame(0, $this->light->getBrightness());
    }

    public function test_turn_light_on()
    {
        $this->light->turnOn();

        $this->assertEquals(1, $this->light->getBrightness());
    }

    public function test_turn_light_off()
    {
        $this->light->turnOn();

        $this->assertEquals(1, $this->light->getBrightness());

        $this->light->turnOff();

        $this->assertEquals(0, $this->light->getBrightness());

        $this->light->turnOff();

        $this->assertEquals(0, $this->light->getBrightness());
    }

    public function test_toggle_light()
    {
        $this->light->toggle();

        $this->assertEquals(2, $this->light->getBrightness());

        $this->light->toggle();

        $this->assertEquals(4, $this->light->getBrightness());
    }
}
