<?php

namespace App\HTML;

function getLinks(array $html): array {
    return collect($html)
        ->filter(fn($item) => in_array($item['name'], ["img", "a", "link"]))
        ->map(fn($item) => $item["src"] ?? $item["href"])
        ->values()
        ->toArray();
}