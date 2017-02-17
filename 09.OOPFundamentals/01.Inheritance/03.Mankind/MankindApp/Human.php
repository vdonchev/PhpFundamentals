<?php

namespace MankindApp;

abstract class Human
{
    private $firstName;
    private $lastName;

    public function __construct(string $firstName, string $lastName)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
    }

    protected function setFirstName(string $firstName)
    {
        if ($firstName[0] !== strtoupper($firstName[0])) {
            throw new \Exception("Expected upper case letter!Argument: firstName");
        }

        if (!preg_match("/.{4,}/", $firstName)) {
            throw new \Exception("Expected length at least 4 symbols!Argument: firstName");
        }

        $this->firstName = $firstName;
    }

    protected function setLastName(string $lastName)
    {
        if ($lastName[0] !== strtoupper($lastName[0])) {
            throw new \Exception("Expected upper case letter!Argument: lastName");
        }

        if (!preg_match("/.{3,}/", $lastName)) {
            throw new \Exception("Expected length at least 3 symbols!Argument: lastName");
        }

        $this->lastName = $lastName;
    }

    public function __toString(): string
    {
        $output = "First Name: {$this->firstName}" . PHP_EOL;
        $output .= "Last Name: {$this->lastName}" . PHP_EOL;

        return $output;
    }
}