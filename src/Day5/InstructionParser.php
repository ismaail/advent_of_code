<?php

namespace Puzzle\Day5;

/**
 * Class InstructionParser
 * @package Day5
 */
class InstructionParser
{
    /**
     * @var int
     */
    private $niceWords = 0;

    /**
     * @var WordFilter
     */
    private $filter;

    /**
     * InstructionParser constructor.
     *
     * @param WordFilter $filter
     */
    public function __construct(WordFilter $filter)
    {
        $this->filter = $filter;
    }

    /**
     * @return int
     */
    public function getNiceWords()
    {
        return $this->niceWords;
    }

    /**
     * @param string $source
     */
    public function parse($source)
    {
        $source = trim($source);

        array_map([$this, 'process'], explode(PHP_EOL, $source));
    }

    /**
     * @param string $word
     */
    private function process($word)
    {
        if ($this->filter->isNice($word)) {
            $this->niceWords++;
        }
    }
}
