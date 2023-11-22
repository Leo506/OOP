<?php

namespace App\states;

use Exception;

class Disconnected
{
    public function connect()
    {
        return new Connected();
    }

    public function disconnect()
    {
        throw new Exception();
    }

    public function write($data)
    {
        throw new Exception();
    }

    function __toString()
    {
        return "disconnected";
    }
}
