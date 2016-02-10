<?php

namespace PuzzleTest\Day6;

use Puzzle\Day6\Light;
use Puzzle\Day6\LightGrid;
use Puzzle\Day6\InstructionParser;

class InstructioParserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param null|array $methods
     *
     * @return \PHPUnit_Framework_MockObject_MockObject|LightGrid
     */
    private function mockLightGrid($methods = null)
    {
        $mock = $this
            ->getMockBuilder(LightGrid::class)
            ->disableOriginalConstructor()
            ->setMethods($methods)
            ->getMock()
        ;

        return $mock;
    }

    public function test_match_instruction()
    {
        $parser = new InstructionParser($this->mockLightGrid());

        $reflectedMethod = new \ReflectionMethod(InstructionParser::class, 'isValidInstruction');
        $reflectedMethod->setAccessible(true);

        $string = 'turn on 0,0 through 999,999';
        $matches = $reflectedMethod->invoke($parser, $string);

        $this->assertSame([
            0 => $string,
            1 => 'turn on',
            2 => '0',
            3 => '0',
            4 => '999',
            5 => '999',
        ], $matches);
    }

    public function test_parse_setup_lights()
    {
        $source = <<<EOF
turn on 0,0 through 2,2

EOF;

        $gridMock = $this->mockLightGrid(['setUpLights']);

        $gridMock
            ->expects($this->once())
            ->method('setUpLights')
        ;

        $parser = new InstructionParser($gridMock);
        $parser->parse($source);
    }

    public function test_parse_setup_lights_with_invalid_instruction()
    {
        $source = <<<EOF
invalid instruction line

EOF;

        $gridMock = $this->mockLightGrid(['setUpLights']);

        $gridMock
            ->expects($this->never())
            ->method('setUpLights')
        ;

        $parser = new InstructionParser($gridMock);
        $parser->parse($source);
    }

    public function test_parse_setup_lights_are_on()
    {
        $source = <<<EOF
turn on 0,0 through 1,1

EOF;

        $lightGrid = new LightGrid();
        $parser = new InstructionParser($lightGrid);
        $parser->parse($source);

        $this->assertCount(4, $lightGrid);
        $this->assertArrayHasKey('0,0', $lightGrid);
        $this->assertArrayHasKey('1,0', $lightGrid);
        $this->assertArrayHasKey('0,1', $lightGrid);
        $this->assertArrayHasKey('1,1', $lightGrid);

        /** @var Light $light */
        foreach ($lightGrid as $light) {
            $this->assertTrue($light->isOn());
            $this->assertFalse($light->isOff());
        }
    }

    public function test_parse_setup_lights_are_off()
    {
        $source = <<<EOF
turn on 0,0 through 2,2
turn off 1,1 through 2,2

EOF;

        $lightGrid = new LightGrid();
        $parser = new InstructionParser($lightGrid);
        $parser->parse($source);

        $this->assertCount(9, $lightGrid);

        // Assert Light ON
        $this->assertTrue($lightGrid['0,0']->isOn());
        $this->assertFalse($lightGrid['0,0']->isOff());
        $this->assertTrue($lightGrid['0,1']->isOn());
        $this->assertFalse($lightGrid['0,1']->isOff());
        $this->assertTrue($lightGrid['0,2']->isOn());
        $this->assertFalse($lightGrid['0,2']->isOff());
        $this->assertTrue($lightGrid['1,0']->isOn());
        $this->assertFalse($lightGrid['1,0']->isOff());
        $this->assertTrue($lightGrid['2,0']->isOn());
        $this->assertFalse($lightGrid['2,0']->isOff());

        // Assert Light OFF
        $this->assertFalse($lightGrid['1,1']->isOn());
        $this->assertTrue($lightGrid['1,1']->isOff());
        $this->assertFalse($lightGrid['1,2']->isOn());
        $this->assertTrue($lightGrid['1,2']->isOff());


        $this->assertFalse($lightGrid['2,1']->isOn());
        $this->assertTrue($lightGrid['2,1']->isOff());
        $this->assertFalse($lightGrid['2,2']->isOn());
        $this->assertTrue($lightGrid['2,2']->isOff());
    }

    public function test_parse_setup_lights_toggle()
    {
        $source = <<<EOF
turn on 0,0 through 2,2
toggle 1,1 through 2,2

EOF;

        $lightGrid = new LightGrid();
        $parser = new InstructionParser($lightGrid);
        $parser->parse($source);

        $this->assertCount(9, $lightGrid);

        // Assert Light ON
        $this->assertTrue($lightGrid['0,0']->isOn());
        $this->assertFalse($lightGrid['0,0']->isOff());
        $this->assertTrue($lightGrid['0,1']->isOn());
        $this->assertFalse($lightGrid['0,1']->isOff());
        $this->assertTrue($lightGrid['0,2']->isOn());
        $this->assertFalse($lightGrid['0,2']->isOff());
        $this->assertTrue($lightGrid['1,0']->isOn());
        $this->assertFalse($lightGrid['1,0']->isOff());
        $this->assertTrue($lightGrid['2,0']->isOn());
        $this->assertFalse($lightGrid['2,0']->isOff());

        // Assert Light OFF
        $this->assertFalse($lightGrid['1,1']->isOn());
        $this->assertTrue($lightGrid['1,1']->isOff());
        $this->assertFalse($lightGrid['1,2']->isOn());
        $this->assertTrue($lightGrid['1,2']->isOff());


        $this->assertFalse($lightGrid['2,1']->isOn());
        $this->assertTrue($lightGrid['2,1']->isOff());
        $this->assertFalse($lightGrid['2,2']->isOn());
        $this->assertTrue($lightGrid['2,2']->isOff());
    }
}
