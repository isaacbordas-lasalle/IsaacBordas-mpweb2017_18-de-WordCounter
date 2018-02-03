<?php

namespace WordCounter\Filters;

use \WordCounter\WordCounter;
use \WordCounter\WordExtractor;
use \WordCounter\WordSanitize;

class MoreTwoCharsWords implements FilterInterface
{

    private $sentence;

    public function __construct(WordCounter $sentence)
    {
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
        $matchfilterwords = [];
        $preparedwords = $this->prepareWords();

        foreach ($preparedwords as $sentenc) {
            $wordlength = mb_strlen($sentenc);
            $lengthcheck = ($wordlength > 2 ? true : false);

            if (!empty($lengthcheck)) {
                $matchfilterwords[] = $sentenc;
            }
        }
        return $matchfilterwords;
    }

}
