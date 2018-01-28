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

    public function countWords(): int
    {
        $splitedsentence = new WordExtractor\WordExtractor();
        $splitedwords = $splitedsentence->extractWords($this->sentence);

        $sanitizewords = new WordSanitize\WordSanitize($splitedwords);
        $sanitizedwords = $sanitizewords->sanitizeWords($splitedwords);

        $matchcount = 0;
        foreach ($sanitizedwords as $sentenc) {
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
