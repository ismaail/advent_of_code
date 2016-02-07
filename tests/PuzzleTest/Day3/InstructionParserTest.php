<?php

namespace PuzzleTest\Day3;

use Puzzle\Day3\Area;
use Puzzle\Day3\InstructionParser;
use Puzzle\Day3\Santa;

class InstructionParserTest extends \PHPUnit_Framework_TestCase
{
    public function test_starting_house_got_present()
    {
        $area = new Area();
        $santa = new Santa();

        $this->assertCount(0, $area);

        $parser = new InstructionParser($area, $santa);

        $this->assertCount(1, $area);
        $this->assertSame(1, $area['0,0']->countPresents());
    }

    public function test_parse_make_santa_move_north()
    {
        $area = new Area();
        $santa = new Santa();

        $parser = new InstructionParser($area, $santa);

        $parser->parse('^');

        $this->assertSame(0, $santa->getPositionX(), 'Wrong X position');
        $this->assertSame(1, $santa->getPositionY(), 'Wrong Y position');
        $this->assertCount(2, $area, 'Wrong number of House');
    }

    public function test_parse_make_santa_move_4_times()
    {
        $area = new Area();
        $santa = new Santa();

        $parser = new InstructionParser($area, $santa);

        $parser->parse('^>v< ');

        $this->assertSame(0, $santa->getPositionX(), 'Wrong X position');
        $this->assertSame(0, $santa->getPositionY(), 'Wrong Y position');
        $this->assertCount(4, $area, 'Wrong number of House');
    }

    public function test_parse_make_santa_move_10_times()
    {
        $area = new Area();
        $santa = new Santa();

        $parser = new InstructionParser($area, $santa);

        $parser->parse('^v^v^v^v^v ');

        $this->assertSame(0, $santa->getPositionX(), 'Wrong X position');
        $this->assertSame(0, $santa->getPositionY(), 'Wrong Y position');
        $this->assertCount(2, $area, 'Wrong number of House');
    }

    public function test_parse_make_santa_move_east()
    {
        $areaMock = $this
            ->getMockBuilder(Area::class)
            ->disableOriginalConstructor()
            ->setMethods(null)
            ->getMock()
        ;

        /** @var Santa $santaMock */
        $santaMock = $this
            ->getMockBuilder(Santa::class)
            ->disableOriginalConstructor()
            ->setMethods(['moveEast'])
            ->getMock()
        ;

        $santaMock
            ->expects($this->once())
            ->method('moveEast')
        ;

        $parser = new InstructionParser($areaMock, $santaMock);

        $parser->parse('>');
    }

    public function test_parse_make_santa_move_south()
    {
        $areaMock = $this
            ->getMockBuilder(Area::class)
            ->disableOriginalConstructor()
            ->setMethods(null)
            ->getMock()
        ;

        /** @var Santa $santaMock */
        $santaMock = $this
            ->getMockBuilder(Santa::class)
            ->disableOriginalConstructor()
            ->setMethods(['moveSouth'])
            ->getMock()
        ;

        $santaMock
            ->expects($this->once())
            ->method('moveSouth')
        ;

        $parser = new InstructionParser($areaMock, $santaMock);

        $parser->parse('v');
    }

    public function test_parse_make_santa_move_west()
    {
        $areaMock = $this
            ->getMockBuilder(Area::class)
            ->disableOriginalConstructor()
            ->setMethods(null)
            ->getMock()
        ;

        /** @var Santa $santaMock */
        $santaMock = $this
            ->getMockBuilder(Santa::class)
            ->disableOriginalConstructor()
            ->setMethods(['moveWest'])
            ->getMock()
        ;

        $santaMock
            ->expects($this->once())
            ->method('moveWest')
        ;

        $parser = new InstructionParser($areaMock, $santaMock);

        $parser->parse('<');
    }

    public function test_parse_make_santa_move_to_wrong_direction()
    {
        $area = new Area();
        $santa = new Santa();

        $parser = new InstructionParser($area, $santa);

        $this->expectException(\InvalidArgumentException::class);

        $parser->parse('!');}
}
