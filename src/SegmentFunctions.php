<?php

use App\Segment;

function reverse(Segment $segment): Segment
{
    return new Segment(dup($segment->getEndPoint()), dup($segment->getBeginPoint()));
}
