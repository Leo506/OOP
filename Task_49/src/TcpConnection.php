<?php

namespace App;

use App\states\Connected;
use App\states\Disconnected;

class TcpConnection implements TcpConnectionInterface
{
    private $ip;
    private $port;
    private $state;

    public function __construct($ip, $port)
    {
        $this->ip = $ip;
        $this->port = $port;
        $this->state = new Disconnected();
    }

    public function getCurrentState()
    {
        return $this->state;
    }

    public function connect()
    {
        $this->state = $this->state->connect();
    }

    public function disconnect()
    {
        $this->state = $this->state->disconnect();
    }

    public function write($data)
    {
        $this->state = $this->state->write($data);
    }
}
