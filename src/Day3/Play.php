<?php

namespace Puzzle\Day3;

use Puzzle\Playable;

/**
 * Class Play
 * @package Puzzle\Day3
 */
class Play implements Playable
{
    /**
     * @return string
     */
    public function play()
    {
        $area = new Area();
        $santa = new Santa();
        $roboSanta = new RoboSanta();

        $parser = new InstructionParser($area, $santa, $roboSanta);

        $file = '/../../data/instructions/day3.dat';

        $parser->parse(file_get_contents(__DIR__ . $file));

        return sprintf('Total houses visited by Santa: %d house', count($area));
    }
}
