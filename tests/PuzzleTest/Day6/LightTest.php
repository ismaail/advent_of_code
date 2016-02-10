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

    public function test_init_status_is_light_off()
    {
        $this->assertFalse($this->light->isOn());
        $this->assertTrue($this->light->isOff());
    }

    public function test_turn_light_on()
    {
        $this->light->turnOn();

        $this->assertTrue($this->light->isOn());
        $this->assertFalse($this->light->isOff());
    }

    public function test_turn_light_off()
    {
        $this->light->turnOn();

        $this->assertTrue($this->light->isOn());
        $this->assertFalse($this->light->isOff());

        $this->light->turnOff();

        $this->assertFalse($this->light->isOn());
        $this->assertTrue($this->light->isOff());
    }

    public function test_toggle_light()
    {
        $this->light->toggle();

        $this->assertTrue($this->light->isOn());
        $this->assertFalse($this->light->isOff());

        $this->light->toggle();

        $this->assertFalse($this->light->isOn());
        $this->assertTrue($this->light->isOff());
    }
}
