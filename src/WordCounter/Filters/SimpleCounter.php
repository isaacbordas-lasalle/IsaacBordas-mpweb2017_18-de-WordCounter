<?php

namespace WordCounter\Filters;

use \WordCounter\WordCounter;

class SimpleCounter implements FilterInterface
{

    private $sentence;

    public function __construct(WordCounter $sentence)
    {
        $this->sentence = $sentence->getSentence();
    }

    public function applyFilter(): array
    {
        return $this->sentence;
    }

}
