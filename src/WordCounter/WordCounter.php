<?php

namespace WordCounter;

use WordCounter\Utilities\ExtractWords;
use WordCounter\Utilities\SanitizeWords;

class WordCounter
{
    private $sentence;

    public function __construct(string $sentence)
    {
        $this->sentence = $sentence;

        $splitSentence = new ExtractWords\ExtractWords();
        $splitedSentence = $splitSentence->extractWords($this->sentence);

        $sanitizeSentence = new SanitizeWords\SanitizeWords();
        $sanitizedSentence = $sanitizeSentence->sanitizeWords($splitedSentence);

        $this->sentence = $sanitizedSentence;

    }

    public function getSentence()
    {
        return $this->sentence;
    }

}
