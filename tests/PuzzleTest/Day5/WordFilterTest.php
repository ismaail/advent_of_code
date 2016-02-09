<?php

namespace PuzzleTest\Day5;

use Puzzle\Day5\WordFilter;

class WordFilterTest extends \PHPUnit_Framework_TestCase
{
    public function test_filter_accepts_string_only()
    {
        $this->expectException(\InvalidArgumentException::class);

        $filter = new WordFilter();
        $filter->isNice(new \StdClass());
    }

    /**
     * @param bool $assert
     * @param string $word
     *
     * @dataProvider vowelsWords
     */
    public function test_word_contains_at_least_three_vowels($assert, $word)
    {
        $reflectedMethod = new \ReflectionMethod(WordFilter::class, 'hasVowels');
        $reflectedMethod->setAccessible(true);

        $filter = new WordFilter();

        $this->assertEquals($assert, $reflectedMethod->invoke($filter, $word));
    }

    public function vowelsWords()
    {
        return [
            [true, 'aaa'],
            [true, 'aeiou'],
            [true, 'abecid'],
            [true, 'xxxaaazzz'],
            [false, 'aa'],
            [false, 'abcderfgh']
        ];
    }

    /**
     * @param bool $assert
     * @param string $word
     *
     * @dataProvider doubleLetterWords
     */
    public function test_word_contains_at_least_one_double_letter($assert, $word)
    {
        $reflectedMethod = new \ReflectionMethod(WordFilter::class, 'hasDoubleLetter');
        $reflectedMethod->setAccessible(true);

        $filter = new WordFilter();

        $this->assertEquals($assert, $reflectedMethod->invoke($filter, $word));
    }

    public function doubleLetterWords()
    {
        return [
            [true, 'dd'],
            [true, 'aabbccdd'],
            [true, 'abcdeefgh'],
            [false, 'abcefg'],
        ];
    }

    /**
     * @param bool $assert
     * @param string $word
     *
     * @dataProvider badWords
     */
    public function test_word_do_not_contains_some_bad_words($assert, $word)
    {
        $reflectedMathod = new \ReflectionMethod(WordFilter::class, 'hasBadWords');
        $reflectedMathod->setAccessible(true);

        $filter = new WordFilter();

        $this->assertEquals($assert, $reflectedMathod->invoke($filter, $word));
    }

    public function badWords()
    {
        return [
            [true, 'abcdefg'],
            [true, 'abcdpqxy'],
            [true, 'aaaacdffff'],
            [true, 'aaaaaaaxy'],
            [false, 'lorem-ipsum'],
        ];
    }

    /**
     * @param bool $assert
     * @param string $word
     *
     * @dataProvider words
     */
    public function test_check_if_word_is_nice($assert, $word)
    {
        $filter = new WordFilter();

        $this->assertEquals($assert, $filter->isNice($word));
    }

    public function words()
    {
        return [
            [true, 'ugknbfddgicrmopn'],
            [true, 'aaa'],
            [false, 'jchzalrnumimnmhp'],
            [false, 'haegwjzuvuyypxyu'],
            [false, 'dvszwmarrgswjxmb'],
        ];
    }
}
