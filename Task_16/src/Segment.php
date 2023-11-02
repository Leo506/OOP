<?php

namespace Task_16;

use Task_16\Point;

class Segment
{
    private Point $beginPoint;
    private Point $endPoint;

    public function __construct(Point $beginPoint, Point $endPoint)
    {
        $this->beginPoint = $beginPoint;
        $this->endPoint = $endPoint;
    }

    public function getBeginPoint(): Point
    {
        return $this->beginPoint;
    }

    public function getEndPoint(): Point
    {
        return $this->endPoint;
    }

    public function __toString()
    {
        return '[' . $this->beginPoint . ', ' . $this->endPoint . ']';
    }
}
