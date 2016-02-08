<?php

namespace Puzzle\Day4;

/**
 * Class Md5Hasher
 * @package Puzzle\Day4
 */
class Md5Hasher implements HasherInterface
{
    /**
     * @param string $input
     *
     * @return string
     */
    public function hash($input)
    {
        return md5($input);
    }
}
