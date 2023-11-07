<?php

namespace App\Tests;

use App\Course;
use PHPUnit\Framework\TestCase;

class CourseTest extends TestCase
{
    function testGetName()
    {
        $courseName = "Some name";
        $course = new Course($courseName);

        $this->assertEquals($courseName, $course->getName());
    }
}
