<?php

namespace WordCounter\Filters;

class VowelStartingWords extends \WordCounter\WordCounter implements FilterInterface
{

    public function countWords() : int
    {
      $sentence = explode(' ', $this->getSentence());
      $i = 0;
      foreach ($sentence as $sentenc){
        $matches[$i] = (preg_match_all('#[aeiouáéíóúàèìòù\s]+#i', $sentenc[0]) ? preg_match_all('#[aeiouáéíóúàèìòù\s]+#i', $sentenc[0]) : null);
        if ($matches[$i] === null) unset($matches[$i]);
        $i++;
      }
      return count($matches);
    }

}
