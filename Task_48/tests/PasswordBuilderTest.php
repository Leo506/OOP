<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\PasswordBuilder;
use App\HackzillaPasswordGeneratorAdapter;

class PasswordBuilderTest extends TestCase
{
    public function testBuildPassword()
    {
        $builder = new PasswordBuilder(new HackzillaPasswordGeneratorAdapter());

        $passwordInfo = $builder->buildPassword();
        $this->assertEquals(8, mb_strlen($passwordInfo['password']));
        $this->assertMatchesRegularExpression('/^[^A-Z]+$/', $passwordInfo['password']);

        $passwordInfo2 = $builder->buildPassword(10, []);
        $this->assertEquals(10, mb_strlen($passwordInfo2['password']));
        $this->assertMatchesRegularExpression('/^[a-z]+$/', $passwordInfo2['password']);

        $passwordInfo3 = $builder->buildPassword(15, ['numbers', 'upperCase']);
        $this->assertEquals(15, mb_strlen($passwordInfo3['password']));
        // NOTE: собирается набор символов для пароля, а потом из него случайным образом выбираются символы. Таким образом, там может не оказаться цифр, даже если они были добавлены в набор для генерации.


        $this->assertMatchesRegularExpression('/^[^\W_]+$/', $passwordInfo3['password']);
    }
}
