<?php

namespace MankindApp;

abstract class Human
{
    private $firstName;
    private $lastName;

    public function __construct(string $firstName, string $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    protected function setFirstName(string $firstName)
    {
        if (!preg_match("/[A-Z]/", $firstName)) {
            throw new \Exception("Expected upper case letter!Argument: firstName");
        }

        if (!preg_match("/.{4,}/", $firstName)) {
            throw new \Exception("Expected length at least 4 symbols!Argument: firstName");
        }

        $this->firstName = $firstName;
    }

    protected function setLastName(string $lastName)
    {
        if (!preg_match("/[A-Z]/", $lastName)) {
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