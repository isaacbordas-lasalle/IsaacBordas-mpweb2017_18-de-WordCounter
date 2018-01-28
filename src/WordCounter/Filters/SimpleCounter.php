<?php

namespace WordCounter\Filters;

use \WordCounter\WordCounter;
use \WordCounter\WordExtractor;
use \WordCounter\WordSanitize;

class SimpleCounter extends WordCounter implements FilterInterface
{

    private $sentence;

    public function __construct(WordCounter $sentence)
    {
        $this->sentence = $sentence->getSentence();
    }

    public function prepareWords(): array
    {

        $splitedsentence = new WordExtractor\WordExtractor();
        $splitedwords = $splitedsentence->extractWords($this->sentence);

        $sanitizewords = new WordSanitize\WordSanitize();
        $sanitizedwords = $sanitizewords->sanitizeWords($splitedwords);

        return $sanitizedwords;

    }

    public function noFilter(): int
    {
        $preparedwords = $this->prepareWords();

        return count($preparedwords);
    }

}
