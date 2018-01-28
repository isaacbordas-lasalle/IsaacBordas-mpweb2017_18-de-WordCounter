<?php

namespace WordCounter\Filters;

interface FilterInterface
{

    public function prepareWords(): array;

    public function countWords(): int;

}
