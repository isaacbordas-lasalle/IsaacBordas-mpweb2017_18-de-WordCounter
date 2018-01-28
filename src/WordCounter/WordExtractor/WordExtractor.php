<?php

namespace WordCounter\WordExtractor;


class WordExtractor
{

    public function extractWords(string $sentence): array
    {
        $splitedsentence = explode(' ', $sentence);
        return $splitedsentence;
    }

}