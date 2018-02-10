<?php

namespace WordCounter\Filters;

use \WordCounter\WordCounter;

class MoreTwoCharsWords implements FilterInterface
{

    private $sentence;

    public function __construct(WordCounter $sentence)
    {
        $this->sentence = $sentence->getSentence();
    }

    public function applyFilter(): array
    {
        $matchfilterwords = [];

        foreach ($this->sentence as $sentenc) {
            $wordlength = mb_strlen($sentenc);
            $lengthcheck = ($wordlength > 2 ? true : false);

            if (!empty($lengthcheck)) {
                $matchfilterwords[] = $sentenc;
            }
        }
        return $matchfilterwords;
    }

}
