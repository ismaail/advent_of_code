<?php

namespace PuzzleTest\Day1;

use Puzzle\Day1\Elevator;
use Puzzle\Day1\InstructionParser;

/**
 * Class InstructionReader
 * @package PuzzleTest\Day1
 */
class InstructionParserTest extends \PHPUnit_Framework_TestCase
{
    public function test_reader_instance()
    {
        $mock = $this
            ->getMockBuilder(Elevator::class)
            ->disableOriginalConstructor()
            ->setMethods(null)
            ->getMock()
        ;

        $parser = new InstructionParser($mock);

        $this->assertInstanceOf(InstructionParser::class, $parser);
    }

    public function test_parser_call_elevator_go_up_method()
    {
        $mock = $this
            ->getMockBuilder(Elevator::class)
            ->disableOriginalConstructor()
            ->setMethods(['goUp', 'goDown'])
            ->getMock()
        ;

        $mock
            ->expects($this->once())
            ->method('goUp')
        ;

        $mock
            ->expects($this->never())
            ->method('goDown')
        ;

        $parser = new InstructionParser($mock);

        $parser->parse('(');
    }

    public function test_parser_call_elevator_go_down_method()
    {
        $mock = $this
            ->getMockBuilder(Elevator::class)
            ->disableOriginalConstructor()
            ->setMethods(['goUp', 'goDown'])
            ->getMock()
        ;

        $mock
            ->expects($this->never())
            ->method('goUp')
        ;

        $mock
            ->expects($this->once())
            ->method('goDown')
        ;

        $parser = new InstructionParser($mock);

        $parser->parse(')');
    }

    public function test_throw_excepion_if_parsing_invalide_instruction()
    {
        $mock = $this
            ->getMockBuilder(Elevator::class)
            ->disableOriginalConstructor()
            ->setMethods(['goUp', 'goDown'])
            ->getMock()
        ;

        $mock
            ->expects($this->never())
            ->method('goUp')
        ;

        $mock
            ->expects($this->never())
            ->method('goDown')
        ;

        $parser = new InstructionParser($mock);

        $this->expectException(\InvalidArgumentException::class);

        $parser->parse('|o|');
    }
}
