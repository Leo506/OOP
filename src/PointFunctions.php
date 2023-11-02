<?php

use App\Point;
use App\User;

function getMidpoint(Point $pointOne, Point $pointTwo): Point
{
    $x = ($pointTwo->x + $pointOne->x) / 2;
    $y = ($pointTwo->y + $pointOne->y) / 2;
    $point = new Point($x, $y);
    return $point;
}

function dup(Point $point): Point
{
    $newPoint = new Point($point->x, $point->y);
    return $newPoint;
}

function areUsersEqual(User $user1, User $user2): bool
{
    return $user1->id === $user2->id;
}
