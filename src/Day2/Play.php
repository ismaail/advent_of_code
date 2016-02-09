<?php

namespace Puzzle\Day2;

use Puzzle\Playable;
use Puzzle\FileRead;

/**
 * Class Play
 * @package Puzzle\Day2
 */
class Play implements Playable
{
    use FileRead;

    /**
     * @return string
     */
    public function play()
    {
        $present = new Present();
        $parser = new InstructionParser($present);

        $parser->parse($this->read(2));

        return sprintf(
            'Total area for all presents: %d feet, which need %d feet of ribbon',
            $parser->getTotalArea(),
            $parser->getTotalRibbon()
        );
    }
}
