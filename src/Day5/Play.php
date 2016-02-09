<?php

namespace Puzzle\Day5;

use Puzzle\Playable;

/**
 * Class Play
 * @package Puzzle\Day5
 */
class Play implements Playable
{
    /**
     * @return string
     */
    public function play()
    {
        $parser = new InstructionParser(new WordFilter());

        $file = '/../../data/instructions/day5.dat';

        $parser->parse(file_get_contents(__DIR__ . $file));

        return sprintf('Number of nice words: %d words.', $parser->getNiceWords());
    }
}
