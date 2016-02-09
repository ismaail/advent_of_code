<?php

namespace Puzzle\Day4;

/**
 * Class InstructionParser
 * @package Puzzle\Day4
 */
class InstructionParser
{
    /**
     * @var HasherInterface
     */
    private $hasher;

    /**
     * InstructionParser constructor.
     *
     * @param HasherInterface $hasher
     */
    public function __construct(HasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    /**
     * @param string $input
     *
     * @return bool|int
     */
    public function parse($input)
    {
        $input = trim($input);

        foreach ($this->process($input) as $index => $hash) {
            if ($this->isCorrect($hash)) {
                return $index;
            }
        }

        return false;
    }

    /**
     * @param string $input
     *
     * @return \Generator
     */
    private function process($input)
    {
        $i = 0;

        while (true) {
            yield $this->hasher->hash($input . $i++);
        }
    }

    /**
     * @param string $answer
     *
     * @return bool
     */
    public function isCorrect($answer)
    {
        return '000000' === substr($answer, 0, 6);
    }
}
