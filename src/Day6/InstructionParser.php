<?php

namespace Puzzle\Day6;

/**
 * Class InstructionParser
 * @package Puzzle\Day6
 */
class InstructionParser
{
    /**
     * @var LightGrid
     */
    private $grid;

    /**
     * InstructionParser constructor.
     *
     * @param LightGrid $grid
     */
    public function __construct(LightGrid $grid)
    {
        $this->grid = $grid;
    }

    /**
     * @param string $source
     */
    public function parse($source)
    {
        $instructions = explode(PHP_EOL, trim($source));

        array_map([$this, 'process'], $instructions);
    }

    /**
     * @param string $instruction
     */
    private function process($instruction)
    {
        $matches = $this->isValidInstruction($instruction);

        if (! $matches) {
            return;
        }

        $this->grid->setUpLights(
            [(int)$matches[2], (int)$matches[3]],
            [(int)$matches[4], (int)$matches[5]],
            $matches[1]
        );
    }

    /**
     * @param string $string
     *
     * @return array
     */
    private function isValidInstruction($string)
    {
        $pattern = '/^(\bturn on\b|\bturn off\b|\btoggle\b){1} (\d{1,3}),(\d{1,3}) through (\d{1,3}),(\d{1,3})$/';

        preg_match($pattern, $string, $matches);

        return $matches;
    }
}
