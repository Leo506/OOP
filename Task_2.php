<?php

$point1 = ['x' => 0, 'y' => 0];
$point2 = ['x' => 4, 'y' => 4];
$point3 = getMidpoint($point1, $point2);
print_r($point3);
print "<br>";
$point1 = ['x' => -1, 'y' => 10];
$point2 = ['x' => 0, 'y' => -3];
$point3 = getMidpoint($point1, $point2);
print_r($point3);


function getMidpoint(array $point1, array $point2): array {
    $x = ($point1['x'] + $point2['x']) / 2;
    $y = ($point1['y'] + $point2['y']) / 2;
    return [
        'x' => $x,
        'y' =>  $y
    ];
}