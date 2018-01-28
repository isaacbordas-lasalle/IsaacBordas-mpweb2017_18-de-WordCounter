<?php

namespace WordCounter\Filters;

use \WordCounter\WordCounter;
use \WordCounter\WordExtractor;
use \WordCounter\WordSanitize;

class SearchKeywords extends WordCounter implements FilterInterface
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

    public function countWords(): int
    {

        $preparedwords = $this->prepareWords();
        $countbykeyword = $this->searchByKeyword($preparedwords);

        return $countbykeyword;
    }

    private function searchByKeyword(array $words): int
    {
        $keywordscount = array_count_values($words);
        $counter = 0;
        foreach ($keywordscount as $key => $value) {
            if ($key == 'palabrejas') {
                $counter = $counter + $value;
            }
            if ($key == 'gañán') {
                $counter = $counter + $value;
            }
            if ($key == 'hiper-arquitecto') {
                $counter = $counter + $value;
            }
            if ($key == 'que' || $key == 'Que') {
                $counter = $counter + $value;
            }
            if ($key == 'eh') {
                $counter = $counter + $value;
            }
        }

        return $counter;
    }

}
