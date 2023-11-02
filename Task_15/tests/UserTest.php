<?php
// установка
// composer require --dev phpunit/phpunit ^10
// composer update
// запуск
// php ./vendor/bin/phpunit --testdox tests
namespace App\Tests;

use Task_15\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testAddress()
    {
        $address = new User\Address('Russia', 'Moscow', 'Lenina');

        $this->assertEquals('Russia', $address->getCountry());
        $this->assertEquals('Moscow', $address->getCity());
        $this->assertEquals('Lenina', $address->getStreet());

        $address->setCountry('Netherlands');
        $this->assertEquals('Netherlands', $address->getCountry());

        $address->setCity('Amsterdam');
        $this->assertEquals('Amsterdam', $address->getCity());

        $address->setStreet('Brouwersgracht');
        $this->assertEquals('Brouwersgracht', $address->getStreet());
    }

    public function testUsersWithAddresses()
    {
        $user = new User('Ivan');
        $this->assertEquals('Ivan', $user->getName());

        $address = new User\Address('Russia', 'Moscow', 'Lenina');

        $user->addAddress($address);

        $user2 = new User('Mila');
        $user2->addAddress($address);

        $this->assertEquals(
            $user->getAddresses(),
            $user2->getAddresses()
        );

        $this->assertEquals(
            $user->getAddresses(),
            [$address]
        );

        $address->setCountry('USA');

        $this->assertEquals(
            $user->getAddresses(),
            $user2->getAddresses()
        );

        $address2 = new User\Address('Russia', 'Omsk', 'Belinskigo');
        $user->addAddress($address2);
        $this->assertIsArray($user->getAddresses());
        $this->assertCount(2, $user->getAddresses());

        $this->assertEquals(
            $user->getAddresses(),
            [$address, $address2]
        );
    }
}

