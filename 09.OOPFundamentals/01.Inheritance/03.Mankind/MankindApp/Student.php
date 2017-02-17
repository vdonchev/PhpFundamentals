<?php


namespace MankindApp;


class Student extends Human
{
    private $facultyNumber;

    public function __construct(string $firstName, string $lastName, string $facultyNumber)
    {
        parent::__construct($firstName, $lastName);

        $this->setFacultyNumber($facultyNumber);
    }

    public function setFacultyNumber($facultyNumber)
    {
        if (strlen($facultyNumber) < 5 || strlen($this->facultyNumber) > 10) {
            throw new \Exception("Invalid faculty number!");
        }

        $this->facultyNumber = $facultyNumber;
    }

    public function __toString(): string
    {
        $output = parent::__toString();
        $output .= "Faculty number: {$this->facultyNumber}" . PHP_EOL;

        return $output . PHP_EOL;
    }
}