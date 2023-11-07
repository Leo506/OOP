<?php

namespace App;

use Tightenco\Collect\Support\Collection;

class DeckOfCards
{
    private Collection $cards;

    public function __construct(array $cards)
    {
        $this->cards = collect($cards);
        $this->cards = $this->cards
            ->map(fn ($card) => [$card, $card, $card, $card])
            ->flatten();
    }

    public function getShuffled(): array
    {
        return $this->cards->shuffle()->all();
    }
}
