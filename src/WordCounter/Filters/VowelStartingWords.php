<?php

namespace WordCounter\Filters;

use \WordCounter\WordCounter;
use \WordCounter\WordExtractor;
use \WordCounter\WordSanitize;

class VowelStartingWords extends WordCounter implements FilterInterface
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

    public function firstVowelMatch(): int
    {
        $preparedwords = $this->prepareWords();


        $matchcount = 0;
        foreach ($preparedwords as $sentenc) {
            if (!empty(preg_match_all('#[AEIOUÁÉÍÓÚÀÈÌÒÙaeiouáéíóúàèìòù\s]+#i', $sentenc[0]))) {
                $matchcount++;
            }
        }
        return $matchcount;

    }

}
