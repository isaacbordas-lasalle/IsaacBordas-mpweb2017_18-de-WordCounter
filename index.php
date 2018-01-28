<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'vendor/autoload.php';

use WordCounter\Filters;

$sentence = 'Esto es un texto molón que sirve como juego de pruebas para la kata de contar palabrejas. No me hagas un diseño de gañán ni de hiper-arquitecto. Que te veo, eh.';

print 'Frase: ' . $sentence . '<br /><br />';

$simplecounter = new Filters\SimpleCounter(new \WordCounter\WordCounter($sentence));
print 'Número total de palabras sin filtros: ' . $simplecounter->countWords() . '<br />';

$vowelstartingcounter = new Filters\VowelStartingWords(new \WordCounter\WordCounter($sentence));
print 'Número total de palabras que empiezan por vocal: ' . $vowelstartingcounter->countWords() . '<br />';

$morewicharscounter = new Filters\MoreTwoCharsWords(new \WordCounter\WordCounter($sentence));
print 'Número total de palabras que tienen más de dos caracteres: ' . $morewicharscounter->countWords() . '<br />';

$searchbykeywords = new Filters\SearchKeywords(new \WordCounter\WordCounter($sentence));
print 'Número total de coincidencias: ' . $searchbykeywords->countWords() . '<br />';