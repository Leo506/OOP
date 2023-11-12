<?php

namespace App\Normalizer;

function normalize(array $data): array {
    return collect($data)
            ->mapToGroups(fn($item) => [normalizeString($item['country']) => normalizeString($item['name'])])
            ->map(fn($item) => $item->unique()->sort()->values())
            ->sortDesc()
            ->toArray();
}

function normalizeString(string $str): string {
    return trim(strtolower($str));
}