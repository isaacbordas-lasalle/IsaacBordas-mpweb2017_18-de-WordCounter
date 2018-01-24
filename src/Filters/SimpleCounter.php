<?php

namespace WordCounter\Filters;

class SimpleCounter extends \WordCounter\WordCounter
{

    public function countWords() : int
    {
      return count(explode(' ', $this->getSentence()));
    }

}
