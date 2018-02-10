<?php

namespace WordCounter\Filters;

use \WordCounter\WordCounter;

class SearchKeywords implements FilterInterface
{

    private $sentence;
    private $keywords;

    public function __construct(WordCounter $sentence, array $keywords)
    {
        $this->keywords = $keywords;
        $this->sentence = $sentence->getSentence();
    }

    public function applyFilter(): array
    {

        $keywordscount = array_count_values($this->sentence);

        $matchfilterwords = [];
        foreach ($this->keywords as $keyword) {
            $upperword = ucfirst($keyword);
            if (isset($keywordscount[$keyword])) {
                $matchfilterwords[] = $keyword;
            }
            if (isset($keywordscount[$upperword])) {
                $matchfilterwords[] = $upperword;
            }
        }

        return $matchfilterwords;
    }

}
