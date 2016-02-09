<?php

namespace Puzzle\Day4;

use Puzzle\Playable;
use Puzzle\FileRead;

/**
 * Class Play
 * @package Puzzle\Day4
 */
class Play implements Playable
{
    use FileRead;

    /**
     * @return bool|int
     */
    public function play()
    {
        $parser = new InstructionParser(new Md5Hasher());

        return $parser->parse($this->read(4));
    }
}
