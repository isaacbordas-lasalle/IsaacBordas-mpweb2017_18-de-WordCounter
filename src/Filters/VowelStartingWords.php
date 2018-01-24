<?php

namespace WordCounter\Filters;

class VowelStartingWords extends \WordCounter\WordCounter implements FilterInterface
{

    public function countWords() : int
    {
      return count(explode(' ', $this->getSentence()));
    }

}
