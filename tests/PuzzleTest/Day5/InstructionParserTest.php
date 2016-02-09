<?php

namespace PuzzleTest\Day5;

use Puzzle\Day5\WordFilter;

class InstructionParserTest extends \PHPUnit_Framework_TestCase
{
    public function test_init_number_of_nice_words_is_zero()
    {
        $filterMock = $this
            ->getMockBuilder(WordFilter::class)
            ->disableOriginalConstructor()
            ->setMethods(null)
            ->getMock()
        ;

        $parser = new \Puzzle\Day5\InstructionParser($filterMock);

        $this->assertSame(0, $parser->getNiceWords());
    }

    public function test_checking_for_nice_words()
    {
        $filterMock = $this
            ->getMockBuilder(WordFilter::class)
            ->disableOriginalConstructor()
            ->setMethods(['isNice'])
            ->getMock()
        ;

        $filterMock
            ->expects($this->exactly(3))
            ->method('isNice')
            ->will($this->returnValue(true))
        ;

        $source = <<<EOF
lorem
ipsum
dolor

EOF;

        $parser = new \Puzzle\Day5\InstructionParser($filterMock);
        $parser->parse($source);

        $this->assertEquals(3, $parser->getNiceWords());
    }

    public function test_checking_for_bad_words()
    {
        $filterMock = $this
            ->getMockBuilder(WordFilter::class)
            ->disableOriginalConstructor()
            ->setMethods(['isNice'])
            ->getMock()
        ;

        $filterMock
            ->expects($this->exactly(3))
            ->method('isNice')
            ->will($this->returnValue(false))
        ;

        $source = <<<EOF
lorem
ipsum
dolor

EOF;

        $parser = new \Puzzle\Day5\InstructionParser($filterMock);
        $parser->parse($source);

        $this->assertEquals(0, $parser->getNiceWords());
    }
}
