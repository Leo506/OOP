<?php

namespace App\HTML;

use function Symfony\Component\String\s;

function stringify(array $tagData): string
{
    return s()
        ->append(getOpenTag($tagData))
        ->append(getBody($tagData))
        ->append(getCloseTag($tagData))
        ->toString();
}

function getOpenTag(array $tagData): string
{
    return '<' . $tagData['name'] . getAttributes($tagData) . '>';
}

function getAttributes(array $tagData): string
{
    $result = s(' ')
        ->join(
            collect($tagData)
                ->except(['name', 'tagType', 'body'])
                ->map(fn ($value, $key) => $key . "=" . '"' . $value . '"')
                ->toArray()
        )
        ->toString();

    return $result === '' ? '' : ' ' . $result;
}

function getBody(array $tagData): string
{
    return $tagData['body'] ?? '';
}

function getCloseTag(array $tagData): string
{
    return $tagData['tagType'] === 'pair'
        ? '</' . $tagData['name'] . '>'
        : '';
}
