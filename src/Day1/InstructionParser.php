<?php

namespace Puzzle\Day1;

/**
 * Class InstructionFileReader
 * @package Day1
 */
class InstructionParser
{
    private $elevator;

    /**
     * InstructionFileReader constructor.
     *
     * @param Elevator $elevator
     */
    public function __construct(Elevator $elevator)
    {
        $this->elevator = $elevator;
    }

    /**
     * @param string $source
     */
    public function parse($source)
    {
        array_map([$this, 'evaluate'], str_split($source));
    }

    /**
     * @param stirng $instruction
     */
    private function evaluate($instruction)
    {
        switch ($instruction) {
            case '(':
                $this->elevator->goUp();
                break;

            case ')':
                $this->elevator->goDown();
                break;

            default:
                throw new \InvalidArgumentException('Invalide instruction value is given');
        }
    }
}
