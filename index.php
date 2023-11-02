<?php
require_once('vendor/autoload.php');

use App\Point;
use App\User;
use App\Cat;
use App\Segment;
use App\Rational;

$point1 = new Point(1, 10);
$point2 = new Point(10, 1);
 
$midpoint = getMidpoint($point1, $point2);
echo $midpoint->x; // 5.5
echo '<br>';
echo $midpoint->y; // 5.5
echo '<br>';

$point3 = new Point(5, 7);
print_r($point3);
print '<br>';
$point4 = dup($point3);
print_r($point4);
print '<br>';
print_r($point3 == $point4 ? 'true' : 'false');
print '<br>';
print_r($point3 === $point4 ? 'true' : 'false');


$user1 = new User();
$user1->id = 1;
 
$user2 = new User();
$user2->id = 1;
 
// 1 === 1
echo areUsersEqual($user1, $user2) ? 'true' : 'false'; // true
echo '<br>';

// У пользователя другой id
$user3 = new User();
$user3->id = 3;
 
// 1 === 3
echo areUsersEqual($user1, $user3) ? 'true' : 'false'; // false
echo '<br>';

// 1 === 3
echo areUsersEqual($user2, $user3) ? 'true' : 'false'; // false
echo '<br>';

// Другой тип
$cat = new Cat();
$cat->id = 1;
 
// Сравниваются разные типы, поэтому проверка завершается с ошибкой
//echo areUsersEqual($user1, $cat) ? 'true' : 'false'; // Boom! (error)



 
$segment = new Segment(new Point(1, 10), new Point(11, -3));
$reversedSegment = reverse($segment);
 
print_r($reversedSegment->getBeginPoint()); // (11, -3)
echo '<br>';
print_r($reversedSegment->getEndPoint()); // (1, 10)
echo '<br>';



$rat1 = new Rational(3, 9);
echo $rat1->getNumer(); // 3
echo '<br>';
echo $rat1->getDenom(); // 9
echo '<br>'; 

$rat2 = new Rational(10, 3);
 
$rat3 = $rat1->add($rat2); // Абстракция для рационального числа 99/27
echo $rat3->getNumer(); // 99
echo '<br>';
echo $rat3->getDenom(); // 27
echo '<br>';

$rat4 = $rat1->sub($rat2); // Абстракция для рационального числа -81/27
echo $rat4->getNumer(); // -81
echo '<br>';
echo $rat4->getDenom(); // 27
echo '<br>';