<?php

namespace WordCounter\Filters;

class VowelStartingWords extends \WordCounter\WordCounter implements FilterInterface
{

    public function countWords() : int
    {
      $sentence = explode(' ', $this->getSentence());
      $matchcount = 0;
      foreach ($sentence as $sentenc){
        if(!empty($this->FirstVowelMatch($sentenc[0]))){
          $matchcount ++;
        }
      }
      return $matchcount;
    }

    private function FirstVowelMatch(String $firstchar) : int
    {
      return preg_match_all('#[AEIOUÁÉÍÓÚÀÈÌÒÙaeiouáéíóúàèìòù\s]+#i', $firstchar);
    }

}
