<?php

namespace WordCounter\Filters;

use \WordCounter\WordCounter;
use \WordCounter\WordExtractor;
use \WordCounter\WordSanitize;

class MoreTwoCharsWords extends WordCounter implements FilterInterface
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

        $matchcount = 0;
        foreach ($preparedwords as $sentenc) {
            if (!empty($this->moreThanTwoChars($sentenc))) {
                $matchcount++;
            }
        }
        return $matchcount;
    }

    private function moreThanTwoChars(string $word): bool
    {
        $wordlength = mb_strlen($word);
        $lengthcheck = ($wordlength > 2 ? true : false);
        return $lengthcheck;
    }

}
