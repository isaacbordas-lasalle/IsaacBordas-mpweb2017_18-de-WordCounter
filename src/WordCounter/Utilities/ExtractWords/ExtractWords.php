<?php

namespace WordCounter\Utilities\ExtractWords;


class ExtractWords
{

    public function extractWords(string $sentence): array
    {
        $splitSentence = explode(' ', $sentence);
        return $splitSentence;
    }

}