<?php

namespace WordCounter\Filters;

interface FilterInterface
{

    public function extractWordsFromSentence();

    public function countWords();

}
