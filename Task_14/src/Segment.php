<?php

namespace Task_14;

class Segment
{
    private int $beginPoint;
    private int $endPoint;

    public function __construct($beginPoint, $endPoint)
    {
        $this->beginPoint = $beginPoint;
        $this->endPoint = $endPoint;
    }

    public function getBeginPoint(): int
    {
        return $this->beginPoint;
    }

    public function getEndPoint(): int
    {
        return $this->endPoint;
    }
}