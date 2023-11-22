<?php

namespace App\States;

class AlarmState implements State
{
    private int $hours = 6;
    private int $minutes = 0;
    private bool $isActive = false;

    public function getHours(): int
    {
        return $this->hours;
    }

    public function getMinutes(): int
    {
        return $this->minutes;
    }

    public function isAlarmTime(int $hours, int $minutes): bool
    {
        return $this->hours === $hours
            && $this->minutes === $minutes;
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }

    public function changeActiveState(): void
    {
        $this->isActive = !$this->isActive;
    }

    public function clickH(): void
    {
        $this->hours = ($this->hours + 1) % 24;
    }

    public function clickM(): void
    {
        $this->minutes = ($this->minutes + 1) % 60;
    }

    function __toString()
    {
        return "alarm";
    }
}
