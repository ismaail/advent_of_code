<?php

namespace PuzzleTest\Day4;

use Puzzle\Day4\InstructionParser;
use Puzzle\Day4\Md5Hasher;

class InstructionParserTest extends \PHPUnit_Framework_TestCase
{
    public function test_is_correct_answer()
    {
        $hashMock = $this
            ->getMockBuilder(Md5Hasher::class)
            ->disableOriginalConstructor()
            ->setMethods(null)
            ->getMock()
        ;

        $parser = new InstructionParser($hashMock);

        $this->assertFalse($parser->isCorrect(''));
        $this->assertFalse($parser->isCorrect('00000'));
        $this->assertFalse($parser->isCorrect('00000A0000'));
        $this->assertFalse($parser->isCorrect('00000ABCDE'));

        $this->assertTrue($parser->isCorrect('000000ABCD'));
        $this->assertTrue($parser->isCorrect('00000000CD'));
    }

    public function test_parsing_input_with_correct_hash_answer()
    {
        $hashMock = $this
            ->getMockBuilder(Md5Hasher::class)
            ->disableOriginalConstructor()
            ->setMethods(['hash'])
            ->getMock()
        ;

        $hashMock
            ->expects($this->once())
            ->method('hash')
            ->will($this->returnValue('000000ABCD'))
        ;

        $parser = new InstructionParser($hashMock);

        $answer = $parser->parse('foobar');

        $this->assertSame(0, $answer);
    }
}
