<?php

namespace Puzzle\Day4;

/**
 * Interface HasherInterface
 * @package Puzzle\Day4
 */
interface HasherInterface
{
    /**
     * @param string $input
     *
     * @return string
     */
    public function hash($input);
}
