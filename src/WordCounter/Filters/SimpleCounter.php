<?php

namespace WordCounter\Filters;

use \WordCounter\WordCounter;
use \WordCounter\WordExtractor;

class SimpleCounter extends WordCounter implements FilterInterface
{

    private $sentence;

    public function __construct(WordCounter $sentence)
    {
        $this->sentence = $sentence->getSentence();
    }

    public function extractWordsFromSentence(): array
    {
        $splitedsentence = new WordExtractor\WordExtractor();
        return $splitedsentence->extractWords($this->sentence);
    }

    public function countWords(): int
    {
        return count($this->extractWordsFromSentence());
    }

}
