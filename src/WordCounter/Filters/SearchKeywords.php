<?php

namespace WordCounter\Filters;

use \WordCounter\WordCounter;
use \WordCounter\WordExtractor;
use \WordCounter\WordSanitize;

class SearchKeywords implements FilterInterface
{

    private $sentence;
    private $keywords;

    public function __construct(WordCounter $sentence, array $keywords)
    {
        $this->keywords = $keywords;
        $this->sentence = $sentence->getSentence();
    }

    private function prepareWords(): array
    {

        $splitedsentence = new WordExtractor\WordExtractor();
        $splitedwords = $splitedsentence->extractWords($this->sentence);

        $sanitizewords = new WordSanitize\WordSanitize();
        $sanitizedwords = $sanitizewords->sanitizeWords($splitedwords);

        return $sanitizedwords;

    }

    public function applyFilter(): array
    {
        $preparedwords = $this->prepareWords();

        $keywordscount = array_count_values($preparedwords);

        $matchfilter = [];
        foreach ($this->keywords as $keyword) {
            $upperword = ucfirst($keyword);
            if (isset($keywordscount[$keyword])) {
                $matchfilter[] = $keywordscount[$keyword];
            }
            if (isset($keywordscount[$upperword])) {
                $matchfilter[] = $keywordscount[$upperword];
            }
        }

        return $matchfilter;
    }

}
