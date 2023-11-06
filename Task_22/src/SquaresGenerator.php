<?php

namespace App;
use App\Square;

class SquaresGenerator
{
    public static function generate(int $side, int $count = 5): array
    {
        $result = [];
        for ($i = 0; $i < $count; $i++) {
            $result[] = new Square($side);
        }
        return $result;
    }
}
