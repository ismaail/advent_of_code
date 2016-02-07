<?php

namespace PuzzleTest\Day2;

use Puzzle\Day2\InstructionParser;

class InstructionParserTest extends \PHPUnit_Framework_TestCase
{
    public function test_class_instance()
    {
        $mock = $this
            ->getMockBuilder(\Puzzle\Day2\Present::class)
            ->disableOriginalConstructor()
            ->setMethods(null)
            ->getMock()
        ;

        $parser = new InstructionParser($mock);

        $this->assertInstanceOf(InstructionParser::class, $parser);
    }

    public function test_total_area_init_value()
    {
        $mock = $this
            ->getMockBuilder(\Puzzle\Day2\Present::class)
            ->disableOriginalConstructor()
            ->setMethods(null)
            ->getMock()
        ;

        $mock
            ->expects($this->never())
            ->method('getArea')
        ;

        $parser = new InstructionParser($mock);

        $this->assertSame(0, $parser->getTotalArea());
    }

    public function test_total_parser_calculate_total_area()
    {
        $mock = $this
            ->getMockBuilder(\Puzzle\Day2\Present::class)
            ->disableOriginalConstructor()
            ->setMethods(['getArea'])
            ->getMock()
        ;

        $mock
            ->expects($this->exactly(2))
            ->method('getArea')
            ->will($this->returnValue(1))
        ;

        $data = <<<EOF
1x10x1
2x4x3

EOF;

        $parser = new InstructionParser($mock);
        $result = $parser->parse($data);

        $this->assertEquals($parser->getTotalArea(), 2);
    }

    public function test_total_parser_throw_exception_if_wrong_number_of_dimensions()
    {
        $mock = $this
            ->getMockBuilder(\Puzzle\Day2\Present::class)
            ->disableOriginalConstructor()
            ->setMethods(null)
            ->getMock()
        ;

        $data = <<<EOF
1x10x1
2x4x3
1x5

EOF;

        $this->expectException(\InvalidArgumentException::class);

        $parser = new InstructionParser($mock);
        $result = $parser->parse($data);
    }
}
