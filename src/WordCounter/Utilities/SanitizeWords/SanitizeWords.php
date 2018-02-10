<?php

namespace WordCounter\Utilities\SanitizeWords;


class SanitizeWords
{

    public function sanitizeWords(array $sentence): array
    {
        $stripLineBreaks = array_map(array($this, 'removeLineBreaks'), $sentence);
        $stripWhiteSpaces = array_map(array($this, 'removeWhiteSpaces'), $stripLineBreaks);

        return $stripWhiteSpaces;
    }

    private function removeLineBreaks(string $word): string
    {
        $word = preg_replace('/[\r\n\t ]+/', ' ', $word);
        return $word;
    }

    private function removeWhiteSpaces(string $word): string
    {
        $word = trim($word, ".,");
        return $word;
    }

}