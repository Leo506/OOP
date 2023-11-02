<?php

namespace Task_16;

class Point
{
    public float $x;
    public float $y;

    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function __toString()
    {
        return '(' . $this->x . ', ' . $this->y . ')';
    }
}
