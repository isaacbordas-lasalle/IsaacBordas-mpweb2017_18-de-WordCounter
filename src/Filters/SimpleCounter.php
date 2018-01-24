<?php

namespace WordCounter\Filters;

class SimpleCounter
{
    private $sentence;

    public function __construct (String $sentence)
    {
        $this->sentence = $sentence;
    }

    public function countWords() : int
    {
      return count(explode(' ', $this->sentence));
    }

}
