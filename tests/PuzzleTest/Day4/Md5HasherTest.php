<?php

namespace PuzzleTest\Day4;

use Puzzle\Day4\Md5Hasher;

class Md5HasherTest extends \PHPUnit_Framework_TestCase
{
    public function test_hasher_implement_haser_interface()
    {
        $hasher = new Md5Hasher();

        $this->assertInstanceOf(\Puzzle\Day4\HasherInterface::class, $hasher);
    }

    public function test_hash()
    {
        $hasher = new Md5Hasher();

        $this->assertSame('d2e16e6ef52a45b7468f1da56bba1953', $hasher->hash('lorem'));
    }
}
