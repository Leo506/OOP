<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\AlarmClock;

class AlarmClockTest extends TestCase
{
    public function testDefaultValues()
    {
        $clock = new AlarmClock();
        $this->assertEquals(0, $clock->getMinutes());
        $this->assertEquals(12, $clock->getHours());
        $this->assertEquals(6, $clock->getAlarmHours());
        $this->assertEquals(0, $clock->getAlarmMinutes());
    }

    public function testChangeStateWhenClickMode()
    {
        $clock = new AlarmClock();
        $this->assertFalse($clock->isAlarmOn());
        $this->assertEquals('clock', $clock->getCurrentMode());

        $clock->clickMode();
        $clock->tick();
        $this->assertFalse($clock->isAlarmOn());
        $this->assertEquals('alarm', $clock->getCurrentMode());

        $clock->clickMode();
        $clock->tick();
        $this->assertFalse($clock->isAlarmOn());
        $this->assertEquals('clock', $clock->getCurrentMode());

        $clock->longClickMode();
        $clock->tick();
        $this->assertTrue($clock->isAlarmOn());
        $this->assertEquals('clock', $clock->getCurrentMode());

        $clock->clickMode();
        $clock->tick();
        $this->assertTrue($clock->isAlarmOn());
        $this->assertEquals('alarm', $clock->getCurrentMode());

        $clock->clickMode();
        $clock->tick();
        $this->assertTrue($clock->isAlarmOn());
        $this->assertEquals('clock', $clock->getCurrentMode());

        $clock->longClickMode();
        $this->assertFalse($clock->isAlarmOn());
        $this->assertEquals('clock', $clock->getCurrentMode());
    }

    public function testChangingHoursAndMinutes()
    {
        $clock = new AlarmClock();

        $clock->clickH();
        $this->assertEquals(0, $clock->getMinutes());
        $this->assertEquals(13, $clock->getHours());
        $this->assertEquals(6, $clock->getAlarmHours());
        $this->assertEquals(0, $clock->getAlarmMinutes());

        $clock->clickM();
        $this->assertEquals(1, $clock->getMinutes());
        $this->assertEquals(13, $clock->getHours());
        $this->assertEquals(6, $clock->getAlarmHours());
        $this->assertEquals(0, $clock->getAlarmMinutes());

        $clock->clickMode();

        $clock->clickH();
        $this->assertEquals(1, $clock->getMinutes());
        $this->assertEquals(13, $clock->getHours());
        $this->assertEquals(7, $clock->getAlarmHours());
        $this->assertEquals(0, $clock->getAlarmMinutes());

        $clock->clickM();
        $this->assertEquals(1, $clock->getMinutes());
        $this->assertEquals(13, $clock->getHours());
        $this->assertEquals(7, $clock->getAlarmHours());
        $this->assertEquals(1, $clock->getAlarmMinutes());

        for ($i = 0; $i < 60; $i++) {
            $clock->clickM();
        }

        $this->assertEquals(7, $clock->getAlarmHours());
        $this->assertEquals(1, $clock->getAlarmMinutes());

        for ($i = 0; $i < 17; $i++) {
            $clock->clickH();
        }
        $this->assertEquals(0, $clock->getAlarmHours());
    }

    public function testNoBellingIfAlarmOff()
    {
        $clock = new AlarmClock();
        for ($i = 0; $i < 18 * 60; $i++) {
            $clock->tick();
        }
        $this->assertTrue($clock->isAlarmTime());
        $this->assertEquals('clock', $clock->getCurrentMode());
        $this->assertEquals(6, $clock->getHours());
        $this->assertEquals(0, $clock->getMinutes());
        $clock->tick();
        $this->assertEquals('clock', $clock->getCurrentMode());
    }

    public function testStartingBellIfAlarmOn1()
    {
        $clock = new AlarmClock();
        $clock->longClickMode();
        for ($i = 0; $i < 18 * 60; $i++) {
            $clock->tick();
        }
        $this->assertTrue($clock->isAlarmTime());
        $this->assertEquals('bell', $clock->getCurrentMode());
        $this->assertEquals(6, $clock->getHours());
        $this->assertEquals(0, $clock->getMinutes());
        $clock->tick();
        $this->assertEquals('clock', $clock->getCurrentMode());
    }

    public function testStartingBellIfAlarmOn2()
    {
        $clock = new AlarmClock();
        $clock->longClickMode();
        for ($i = 0; $i < 18 * 60; $i++) {
            $clock->tick();
        }
        $this->assertTrue($clock->isAlarmTime());
        $this->assertEquals('bell', $clock->getCurrentMode());
        $clock->clickMode();
        $this->assertEquals('clock', $clock->getCurrentMode());
    }

    public function testStartingBellIfAlarmOn()
    {
        $clock = new AlarmClock();
        $clock->longClickMode();
        $clock->clickMode();
        $this->assertEquals('alarm', $clock->getCurrentMode());
        for ($i = 0; $i < 18 * 60; $i++) {
            $clock->tick();
        }
        $this->assertTrue($clock->isAlarmTime());
        $this->assertTrue($clock->isAlarmOn());
        $this->assertEquals('bell', $clock->getCurrentMode());

        $clock->clickMode();
        $this->assertEquals('clock', $clock->getCurrentMode());
    }

    public function testNoBellForAlarmModeIfAlarmOff()
    {
        $clock = new AlarmClock();
        $clock->clickMode();
        $this->assertEquals('alarm', $clock->getCurrentMode());
        for ($i = 0; $i < 18 * 60; $i++) {
            $clock->tick();
        }
        $this->assertTrue($clock->isAlarmTime());
        $this->assertFalse($clock->isAlarmOn());
        $this->assertEquals('alarm', $clock->getCurrentMode());

        $clock->clickMode();
        $clock->tick();
        $this->assertEquals('clock', $clock->getCurrentMode());
    }

    public function testIncrementMinutesAfterAlarm()
    {
        $clock = new AlarmClock();
        $clock->longClickMode();
        for ($i = 0; $i < 18 * 60; $i++) {
            $clock->tick();
        }
        print_r($clock->getHours());
        $this->assertTrue($clock->isAlarmTime());
        $this->assertEquals('bell', $clock->getCurrentMode());
        $clock->tick();
        $this->assertEquals('clock', $clock->getCurrentMode());
        $this->assertEquals(1, $clock->getMinutes());
    }
}
