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
        $this->assertFalse($parser->isCorrect('0000'));
        $this->assertFalse($parser->isCorrect('0000A0000'));
        $this->assertFalse($parser->isCorrect('0000ABCDE'));

        $this->assertTrue($parser->isCorrect('00000ABCD'));
        $this->assertTrue($parser->isCorrect('0000000CD'));
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
            ->will($this->returnValue('00000ABCD'))
        ;

        $parser = new InstructionParser($hashMock);

        $answer = $parser->parse('foobar');

        $this->assertSame(0, $answer);
    }

    /**
     * @param string $secret
     * @param string $answer
     * @param string $hash
     *
     * @dataProvider getInputs
     *
     * @group failing
     */
    public function test_looking_for_correct_answers($secret, $answer, $hash)
    {
        $parser = new InstructionParser(new Md5Hasher());

        $result = $parser->parse($secret);


        $this->assertEquals($answer, $result);
    }

    public function getInputs()
    {
        return [
            ['abcdef', '609043', '000001dbbfa3a5c83a2d506429c7b00e'],
            ['pqrstuv', '1048970', '000006136ef2ff3b291c85725f17325c'],
        ];
    }
}
