<?php

namespace App\Normalizer;

use Symfony\Component\String\AbstractString;

use function Symfony\Component\String\s;

function getQuestions(string $text): string {
    $lines = s($text)->split("\n");
    $linesWithQuestions = collect($lines)
                        ->map(fn(AbstractString $line) => $line->trimEnd())
                        ->filter(fn(AbstractString $line) => $line->endsWith('?'))
                        ->toArray();
    return s("\n")->join($linesWithQuestions)->toString();
}