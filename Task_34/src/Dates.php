<?php

namespace App\Dates;

use Carbon\CarbonPeriod;

function buildRange(array $data, string $begin, string $end): array {
    $data = collect($data);
    return collect(CarbonPeriod::create($begin, $end))
            ->map(function ($date, $key) use ($data) {
                $formatedDate = $date->format("d.m.Y");
                return $data->first(fn($value) => $value['date'] == $formatedDate) ?? ["value" => 0, "date" => $formatedDate];
            })
            ->toArray();
}