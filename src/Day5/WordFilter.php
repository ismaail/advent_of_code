<?php

namespace Puzzle\Day5;

/**
 * Class WordFilter
 * @package Puzzle\Day5
 */
class WordFilter
{
    /**
     * @param string $word
     *
     * @return bool
     */
    public function isNice($word)
    {
        if (! is_string($word) && ! is_numeric($word)) {
            throw new \InvalidArgumentException(sprintf('Word Filter accepts only string but got %s', gettype($word)));
        }

        return (
            $this->hasVowels($word)
            && $this->hasDoubleLetter($word)
            && ! $this->hasBadWords($word)
        );
    }

    /**
     * Check if word has at least 3 vowels.
     *
     * @param string $word
     *
     * @return bool
     */
    private function hasVowels($word)
    {
        $pattern = '/([aeiou]+)/i';

        preg_match_all($pattern, $word, $matches);

        $vowels = implode('', $matches[0]);

        return (strlen($vowels) >= 3);
    }

    /**
     * Check if word has one letter that appears twice in a row.
     *
     * @param string $word
     *
     * @return bool
     */
    private function hasDoubleLetter($word)
    {
        $pattern = '/(\w{1})\1/i';

        preg_match_all($pattern, $word, $matches);

        return !empty($matches[0]);
    }

    /**
     * Check if word has specific bad words.
     *
     * @param string $word
     *
     * @return bool
     */
    private function hasBadWords($word)
    {
        $pattern = '/(ab|cd|pq|xy)/i';

        preg_match_all($pattern, $word, $matches);

        return !empty($matches[0]);
    }
}
