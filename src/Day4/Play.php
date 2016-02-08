<?php

namespace Puzzle\Day4;

use Puzzle\Playable;

/**
 * Class Play
 * @package Puzzle\Day4
 */
class Play implements Playable
{
    public function play()
    {
        $parser = new InstructionParser(new Md5Hasher());

        $file = '/../../data/instructions/day4.dat';

        return $parser->parse(file_get_contents(__DIR__ . $file));
    }
}
