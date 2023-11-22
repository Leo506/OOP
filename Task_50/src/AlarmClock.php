<?php

namespace App;

use App\States\AlarmState;
use App\States\BellState;
use App\States\ClockState;

class AlarmClock
{
    private AlarmState $alarmState;
    private ClockState $clockState;
    private $currentState;

    public function __construct()
    {
        $this->alarmState = new AlarmState();
        $this->clockState = new ClockState();
        $this->currentState = $this->clockState;
    }

    public function getMinutes(): int
    {
        return $this->clockState->getMinutes();
    }

    public function getHours(): int
    {
        return $this->clockState->getHours();
    }

    public function getAlarmMinutes(): int
    {
        return $this->alarmState->getMinutes();
    }

    public function getAlarmHours(): int
    {
        return $this->alarmState->getHours();
    }

    public function getCurrentMode()
    {
        return $this->currentState->__toString();
    }

    public function isAlarmOn(): bool
    {
        return $this->alarmState->isActive();
    }

    public function clickMode(): void
    {
        $transitions = [
            'alarm' => $this->clockState,
            'clock' => $this->alarmState,
            'bell' => $this->clockState
        ];
        $this->currentState = $transitions[$this->currentState->__toString()];
    }

    public function tick(): void
    {
        $this->clockState->tick();
        if ($this->isAlarmTime() && $this->isAlarmOn())
            $this->currentState = new BellState();
        else if ($this->currentState instanceof BellState)
            $this->currentState = $this->clockState;
    }

    public function longClickMode(): void
    {
        $this->alarmState->changeActiveState();
    }

    public function clickH(): void
    {
        $this->currentState->clickH();
    }

    public function clickM(): void
    {
        $this->currentState->clickM();
    }

    public function isAlarmTime(): bool
    {
        return $this->alarmState->isAlarmTime(
            $this->clockState->getHours(), 
            $this->clockState->getMinutes());
    }
}
