<?php

namespace App\states;

use Exception;

class Connected
{
    public function connect()
    {
        throw new Exception();
    }

    public function disconnect()
    {
        return new Disconnected();
    }

    public function write($data)
    {
        return $this;
    }

    function __toString()
    {
        return "connected";
    }
}
