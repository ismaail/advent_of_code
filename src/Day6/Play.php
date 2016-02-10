<?php

namespace Puzzle\Day6;

use Puzzle\Playable;
use Puzzle\FileRead;

/**
 * Class Play
 * @package Puzzle\Day6
 */
class Play implements Playable
{
    use FileRead;

    /**
     * @return string
     *
     * @throws \Exception
     */
    public function play()
    {
        $lightGrid = new LightGrid();
        $parser = new InstructionParser($lightGrid);

        $source = $this->read(6);
        $parser->parse($source);

        $lightsOn = 0;

        /** @var Light $light */
        foreach ($lightGrid as $light) {
            if ($light->isOn()) {
                $lightsOn++;
            }
        }

        return sprintf("The number of lights that are lit: %d light.", $lightsOn);
    }
}
