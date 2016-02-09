<?php

namespace Puzzle;

/**
 * Class ReadFile
 * @package Puzzle
 */
trait FileRead
{
    /**
     * @param int $day
     *
     * @return string
     *
     * @throws \Exception   If file to read is not found.
     */
    public function read($day)
    {
        $file = __DIR__ . sprintf('/../data/instructions/day%d.dat', $day);

        if (! file_exists($file)) {
            throw new \Exception(sprintf("File '%s' not found.", $file));
        }

        return file_get_contents($file);
    }
}
