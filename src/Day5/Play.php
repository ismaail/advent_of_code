<?php

namespace Puzzle\Day5;

use Puzzle\Playable;
use Puzzle\FileRead;

/**
 * Class Play
 * @package Puzzle\Day5
 */
class Play implements Playable
{
    use FileRead;

    /**
     * @return string
     */
    public function play()
    {
        $parser = new InstructionParser(new WordFilter());

        $parser->parse($this->read(5));

        return sprintf('Number of nice words: %d words.', $parser->getNiceWords());
    }
}
