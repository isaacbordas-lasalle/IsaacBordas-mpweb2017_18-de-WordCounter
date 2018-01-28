<?php

namespace WordCounter;

class WordCounter
{
    private $sentence;

    public function __construct(string $sentence)
    {
        $this->sentence = $sentence;
    }

    public function getSentence()
    {
        return $this->sentence;
    }

}
