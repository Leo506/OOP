<?php

namespace Task_15\User;

class Address
{
    private string $country;
    private string $city;
    private string $street;

    function __construct(string $country, $city, $street)
    {
        $this->country = $country;
        $this->city = $city;
        $this->street = $street;
    }

    function getCountry(): string
    {
        return $this->country;
    }

    function getCity(): string
    {
        return $this->city;
    }

    function getStreet(): string
    {
        return $this->street;
    }

    function setCountry(string $country): void
    {
        $this->country = $country;
    }

    function setCity(string $city): void
    {
        $this->city = $city;
    }

    function setStreet(string $street): void
    {
        $this->street = $street;
    }
}
