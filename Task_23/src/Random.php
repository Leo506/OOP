<?php

namespace App;

class Random
{

    private const RAND_MAX = 32767;
    private readonly int $seed;
    private int $next = 1;

    public function __construct(int $seed)
    {
        $this->seed = $seed;
        $this->next = $seed;
    }

    public function getNext(): int
    {
        $this->next = (int)($this->next * 1103515245 + 12345);
        return (int)($this->next / 65536) % (self::RAND_MAX + 1);
    }

    public function reset(): void
    {
        $this->next = $this->seed;
    }
}
