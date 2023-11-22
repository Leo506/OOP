<?php

namespace App\States;

class ClockState implements State
{
    private int $minutes = 0;
    private int $hours = 12;

    public function getHours(): int
    {
        return $this->hours;
    }

    public function getMinutes(): int
    {
        return $this->minutes;
    }

    public function tick(): void {
        $this->hours = ($this->hours + ($this->minutes + 1) / 60) % 24;
        $this->minutes = ($this->minutes + 1) % 60;
    }

    public function clickH(): void
    {
        $this->hours = ($this->hours + 1) % 24;
    }

    public function clickM(): void
    {
        $this->minutes = ($this->minutes + 1) % 60;
    }

    public function __toString()
    {
        return 'clock';
    }
}
