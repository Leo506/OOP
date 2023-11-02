<?php

namespace Task_15;

use Task_15\User\Address;

class User
{
    private string $name;
    private array $addresses = [];

    function __construct(string $name)
    {
        $this->name = $name;
    }

    function addAddress(Address $address): void
    {
        array_push($this->addresses, $address);
    }

    function getAddresses(): array
    {
        return $this->addresses;
    }

    function getName(): string
    {
        return $this->name;
    }
}
