<?php

namespace WordCounter\Filters;

use \WordCounter\WordCounter;

class VowelStartingWords implements FilterInterface
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
            if (!empty(preg_match_all('#[AEIOUÁÉÍÓÚÀÈÌÒÙaeiouáéíóúàèìòù\s]+#i', $sentenc[0]))) {
                $matchfilterwords[] = $sentenc;
            }
        }
        return $matchfilterwords;

    }

}
