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

    public function searchByKeyword(array $keywords): int
    {
        $preparedwords = $this->prepareWords();

        $keywordscount = array_count_values($preparedwords);

        $counter = 0;
        foreach ($keywords as $keyword) {
            $upperword = ucfirst($keyword);
            if (isset($keywordscount[$keyword])) {
                $counter = $counter + $keywordscount[$keyword];
            }
            if (isset($keywordscount[$upperword])) {
                $counter = $counter + $keywordscount[$upperword];
            }
        }

        return $counter;
    }

}
