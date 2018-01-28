<?php

namespace WordCounter\Filters;

use \WordCounter\WordCounter;
use \WordCounter\WordExtractor;

class VowelStartingWords extends WordCounter implements FilterInterface
{

    private $sentence;

    public function __construct(WordCounter $sentence)
    {
        $this->sentence = $sentence->getSentence();
    }

    public function extractWordsFromSentence(): array
    {
        $splitedsentence = new WordExtractor\WordExtractor();
        return $splitedsentence->extractWords($this->sentence);
    }

    public function countWords(): int
    {
        $splitedsentence = $this->extractWordsFromSentence();
        $matchcount = 0;
        foreach ($splitedsentence as $sentenc) {
            if (!empty($this->firstVowelMatch($sentenc[0]))) {
                $matchcount++;
            }
        }
        return $matchcount;
    }

    private function firstVowelMatch(string $firstchar): int
    {
        return preg_match_all('#[AEIOUÁÉÍÓÚÀÈÌÒÙaeiouáéíóúàèìòù\s]+#i', $firstchar);
    }

}
