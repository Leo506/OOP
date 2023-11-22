<?php
// composer require hackzilla/password-generator
namespace App;

use Hackzilla\PasswordGenerator\Generator\ComputerPasswordGenerator;

class HackzillaPasswordGeneratorAdapter implements PasswordGeneratorInterface
{
    public function generatePassword($length, $options)
    {
        $generator = new ComputerPasswordGenerator();
        $generator
            ->setOptionValue(ComputerPasswordGenerator::OPTION_UPPER_CASE, $options['upperCase'] ?? false)
            ->setOptionValue(ComputerPasswordGenerator::OPTION_NUMBERS, $options['numbers'] ?? false)
            ->setOptionValue(ComputerPasswordGenerator::OPTION_SYMBOLS, $options['symbols'] ?? false)
            ->setLength($length);
        return $generator->generatePassword();
    }
}
