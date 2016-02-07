<?php

namespace Puzzle\Day1;

/**
 * Class InstructionFileReader
 * @package Day1
 */
class InstructionParser
{
    /**
     * @var Elevator
     */
    private $elevator;

    /**
     * @var int
     */
    private $basement;

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
        $instructions = str_split($source);
        array_map([$this, 'evaluate'], array_keys($instructions), $instructions);
    }

    /**
     * @param int $index
     * @param stirng $instruction
     */
    private function evaluate($index, $instruction)
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

        $this->checkOnBasement($index);
    }

    /**
     * @param int $index
     */
    private function checkOnBasement($index)
    {
        if (null === $this->basement && $this->elevator->isBasement()) {
            $this->basement = $index + 1;
        }
    }

    /**
     * Get first instruction to enter Basement
     *
     * @return int
     */
    public function getEnterdBasementAt()
    {
        return $this->basement;
    }
}
