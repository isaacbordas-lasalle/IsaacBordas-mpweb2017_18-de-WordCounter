<?php

namespace WordCounter;

class WordCounter
{
    private $sentence;

    public function __construct (String $sentence)
    {
        $this->sentence = $sentence;
    }

    public function getSentence ()
    {
      return $this->sentence;
    }

}
