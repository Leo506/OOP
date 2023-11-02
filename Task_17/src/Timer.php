<?php

namespace Task_17;

class Timer
{
    private int $secondsCount;

    public const SEC_PER_MIN = 60;
    public const SEC_PER_HOUR = 3600;

    public function __construct(int $seconds, int $minutes = 0, int $hours = 0)
    {
        $this->secondsCount = $seconds + $minutes * self::SEC_PER_MIN + $hours * self::SEC_PER_HOUR;
    }


    public function getLeftSeconds()
    {
        return $this->secondsCount;
    }

    public function tick()
    {
        $this->secondsCount--;
    }
}
