<?php

namespace WordCounter\Filters;

class SimpleCounter extends \WordCounter\WordCounter implements FilterInterface
{

    public function countWords() : int
    {
      return count(explode(' ', $this->getSentence()));
    }

}
