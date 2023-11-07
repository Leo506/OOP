<?php

namespace App\Comparator;

use Ds\Stack;

function compare(string $first, string $second): bool
{

    $getResultString = function (string $str): string {
        $stack = new Stack();
        $chars = str_split($str);
        foreach ($chars as $char) {
            if ($char !== "#") {
                $stack->push($char);
                continue;
            }

            if ($stack->isEmpty() === false)
                $stack->pop();
        }

        return $stack->isEmpty()
            ? ""
            : array_reduce($stack->toArray(), function ($current, $item) {
                $current .= $item;
                return $current;
            });
    };

    return $getResultString($first) === $getResultString($second);
}
