<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

function printLineBreak()
{
    return (PHP_SAPI === 'cli' ? PHP_EOL : '<br />');
}

require_once 'vendor/autoload.php';

use WordCounter\Filters;

$sentence = 'Esto es un texto molón que sirve como juego de pruebas para la kata de contar palabrejas. No me hagas un diseño de gañán ni de hiper-arquitecto. Que te veo, eh.';

print 'Frase: ' . $sentence . printLineBreak();

$simplecounter = new Filters\SimpleCounter(new \WordCounter\WordCounter($sentence));
print 'Número total de palabras sin filtros: ' . count($simplecounter->applyFilter()) . printLineBreak();

$vowelstartingcounter = new Filters\VowelStartingWords(new \WordCounter\WordCounter($sentence));
print 'Número total de palabras que empiezan por vocal: ' . count($vowelstartingcounter->applyFilter()) . printLineBreak();

$moretwocharscounter = new Filters\MoreTwoCharsWords(new \WordCounter\WordCounter($sentence));
print 'Número total de palabras que tienen más de dos caracteres: ' . count($moretwocharscounter->applyFilter()) . printLineBreak();

$keywords = ['palabrejas', 'gañán', 'hiper-arquitecto', 'que', 'eh'];
$searchbykeywords = new Filters\SearchKeywords(new \WordCounter\WordCounter($sentence), $keywords);
print 'Número total de coincidencias con las keywords (palabrejas, gañán, hiper-arquitecto, que, eh): ' . count($searchbykeywords->applyFilter()) . printLineBreak();

$vowel_filter = new Filters\VowelStartingWords(new \WordCounter\WordCounter($sentence));
$twochar_filter = new Filters\MoreTwoCharsWords(new \WordCounter\WordCounter(implode(' ',
    $vowel_filter->applyFilter())));
print 'Número total de palabras que tienen más de dos caracteres y empiezan por vocal: ' . count($twochar_filter->applyFilter()) . printLineBreak();

$keywords = ['palabrejas', 'gañán', 'hiper-arquitecto', 'que', 'eh'];
$keywords_filter = new Filters\SearchKeywords(new \WordCounter\WordCounter($sentence), $keywords);
$vowel_filter = new Filters\VowelStartingWords(new \WordCounter\WordCounter(implode(' ',
    $keywords_filter->applyFilter())));
print 'Número total de keywords que empiezan por vocal: ' . count($vowel_filter->applyFilter()) . printLineBreak();

$keywords = ['palabrejas', 'gañán', 'hiper-arquitecto', 'que', 'eh'];
$keywords_filter = new Filters\SearchKeywords(new \WordCounter\WordCounter($sentence), $keywords);
$vowel_filter = new Filters\VowelStartingWords(new \WordCounter\WordCounter(implode(' ',
    $keywords_filter->applyFilter())));
$twochar_filter = new Filters\MoreTwoCharsWords(new \WordCounter\WordCounter(implode(' ',
    $vowel_filter->applyFilter())));
print 'Número total de keywords que empiezan por vocal y tienen más de dos caracteres: ' . count($twochar_filter->applyFilter()) . printLineBreak();

$keywords = ['palabrejas', 'gañán', 'hiper-arquitecto', 'que', 'eh'];
$keywords_filter = new Filters\SearchKeywords(new \WordCounter\WordCounter($sentence), $keywords);
$notvowel_filter = new Filters\NotVowelStartingWords(new \WordCounter\WordCounter(implode(' ',
    $keywords_filter->applyFilter())));
print 'Número total de keywords que no empiezan por vocal: ' . count($notvowel_filter->applyFilter()) . printLineBreak();

$notvowel_filter = new Filters\NotVowelStartingWords(new \WordCounter\WordCounter($sentence));
$vowel_filter = new Filters\VowelStartingWords(new \WordCounter\WordCounter($sentence));
$twochar_filter = new Filters\MoreTwoCharsWords(new \WordCounter\WordCounter(implode(' ',
    $vowel_filter->applyFilter())));
$notvowelplusvowelandtwochar = count($twochar_filter->applyFilter()) + count($notvowel_filter->applyFilter());
print 'Número total de palabras que no empiecen por vocal o que sí empiecen por vocal pero tengan mas de dos carácteres: ' . $notvowelplusvowelandtwochar . printLineBreak();

