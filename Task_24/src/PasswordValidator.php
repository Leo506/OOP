<?php


namespace App;

class PasswordValidator
{
    private const TOO_SMALL = "too small";
    private const SHOULD_CONTAIN_NUMBER = "should contain at least one number";

    private const MIN_LENGTH_KEY = "minLength";
    private const CONTAIN_NUMBER_KEY = "containNumbers";

    private array $options;

    public function __construct(?array $options = null)
    {
        if ($options !== null) {
            $this->options[self::CONTAIN_NUMBER_KEY] = $options[self::CONTAIN_NUMBER_KEY] ?? false;
            $this->options[self::MIN_LENGTH_KEY] = $options[self::MIN_LENGTH_KEY] ?? 8;
        }
        else
            $this->options = [
                self::MIN_LENGTH_KEY => 8,
                self::CONTAIN_NUMBER_KEY => false
            ];
    }

    public function validate(string $password): array
    {
        $errors = [];
        if (strlen($password) < $this->options[self::MIN_LENGTH_KEY])
            $errors[self::MIN_LENGTH_KEY] = self::TOO_SMALL;

        if ($this->options[self::CONTAIN_NUMBER_KEY] === false)
            return $errors;

        if (preg_match("/\d/", $password))
            return $errors;
            
        $errors[self::CONTAIN_NUMBER_KEY] = self::SHOULD_CONTAIN_NUMBER;
        return $errors;
    }
}
