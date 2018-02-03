<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'vendor/autoload.php';

use WordCounter\Filters;

$sentence = 'Esto es un texto molón que sirve como juego de pruebas para la kata de contar palabrejas. No me hagas un diseño de gañán ni de hiper-arquitecto. Que te veo, eh.';

print 'Frase: ' . $sentence . '<br /><br />';

$simplecounter = new Filters\SimpleCounter(new \WordCounter\WordCounter($sentence));
print 'Número total de palabras sin filtros: ' . count($simplecounter->applyFilter()) . '<br />';

$vowelstartingcounter = new Filters\VowelStartingWords(new \WordCounter\WordCounter($sentence));
print 'Número total de palabras que empiezan por vocal: ' . count($vowelstartingcounter->applyFilter()) . '<br />';

$moretwocharscounter = new Filters\MoreTwoCharsWords(new \WordCounter\WordCounter($sentence));
print 'Número total de palabras que tienen más de dos caracteres: ' . count($moretwocharscounter->applyFilter()) . '<br />';

$keywords = ['palabrejas', 'gañán', 'hiper-arquitecto', 'que', 'eh'];
$searchbykeywords = new Filters\SearchKeywords(new \WordCounter\WordCounter($sentence), $keywords);
print 'Número total de coincidencias con las keywords (palabrejas, gañán, hiper-arquitecto, que, eh): ' . count($searchbykeywords->applyFilter()) . '<br />';

$vowel_filter = new Filters\VowelStartingWords(new \WordCounter\WordCounter($sentence));
$twochar_filter = new Filters\MoreTwoCharsWords(new \WordCounter\WordCounter(implode(' ', $vowel_filter->applyFilter())));
print 'Número total de palabras que tienen más de dos caracteres y empiezan por vocal: ' . count($twochar_filter->applyFilter()) . '<br />';

$keywords = ['palabrejas', 'gañán', 'hiper-arquitecto', 'que', 'eh'];
$keywords_filter = new Filters\SearchKeywords(new \WordCounter\WordCounter($sentence), $keywords);
$vowel_filter = new Filters\VowelStartingWords(new \WordCounter\WordCounter(implode(' ', $keywords_filter->applyFilter())));
print 'Número total de keywords que empiezan por vocal: ' . count($vowel_filter->applyFilter()) . '<br />';

$keywords = ['palabrejas', 'gañán', 'hiper-arquitecto', 'que', 'eh'];
$keywords_filter = new Filters\SearchKeywords(new \WordCounter\WordCounter($sentence), $keywords);
$vowel_filter = new Filters\VowelStartingWords(new \WordCounter\WordCounter(implode(' ', $keywords_filter->applyFilter())));
$twochar_filter = new Filters\MoreTwoCharsWords(new \WordCounter\WordCounter(implode(' ', $vowel_filter->applyFilter())));
print 'Número total de keywords que empiezan por vocal y tienen más de dos caracteres: ' . count($twochar_filter->applyFilter()) . '<br />';