<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'vendor/autoload.php';

use WordCounter\Filters as Filters;

$sentence = 'Esto es un texto molón que sirve como juego de pruebas para la kata de contar palabrejas. No me hagas un diseño de gañán ni de hiper-arquitecto. Que te veo, eh.';

print 'Frase: ' . $sentence . '<br /><br />';

$simplecounter = new Filters\SimpleCounter($sentence);
print 'Número total de palabras sin filtros: ' . $simplecounter->countWords() . '<br />';

$vowelstartingcounter = new Filters\VowelStartingWords($sentence);
print 'Número total de palabras que empiezan por vocal: ' . $vowelstartingcounter->countWords();
