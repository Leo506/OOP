<?php

namespace App;

use Carbon\Carbon;
use Carbon\CarbonInterface;

class Booking {

    private array $books = [];

    public function book(string $from, string $to): bool {
        $fromDate = Carbon::parse($from);
        $toDate = Carbon::parse($to);
        if (!$this->isValidPeriod($fromDate, $toDate))
            return false;

        foreach ($this->books as $period) {
            if ($toDate->greaterThan($period['from']) && $period['to']->greaterThan($fromDate))
                return false;
        }
        array_push($this->books, [
            "from" => $fromDate,
            "to" => $toDate]);
        return true;
    }

    private function isValidPeriod(CarbonInterface $from, CarbonInterface $to): bool {
        return $to->isAfter($from)
            && $from->diffInDays($to) >= 1;
    }
}