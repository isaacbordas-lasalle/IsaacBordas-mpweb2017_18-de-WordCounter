<?php

namespace WordCounter\WordSanitize;


class WordSanitize
{

    public function sanitizeWords(array $sentence): array
    {
        $striplinebreaks = array_map(array($this, 'removeLineBreaks'), $sentence);
        $stripedwhitespaces = array_map(array($this, 'removeWhiteSpaces'), $striplinebreaks);

        return $stripedwhitespaces;
    }

    public function removeLineBreaks(string $word) : string
    {
        $word = preg_replace( '/[\r\n\t ]+/', ' ', $word );
        return $word;
    }

    public function removeWhiteSpaces(string $word) : string
    {
        $word = trim($word, ".,");
        return $word;
    }

}