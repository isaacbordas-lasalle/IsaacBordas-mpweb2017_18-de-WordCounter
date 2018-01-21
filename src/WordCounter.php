<?php

namespace WordCounter;

class WordCounter
{
    private $sentence;

    public function __construct ($sentence)
    {
        $this->sentence = $sentence;
    }

    public function simpleCounter()
    {
      return count(explode(' ', $this->sentence));
    }

}
