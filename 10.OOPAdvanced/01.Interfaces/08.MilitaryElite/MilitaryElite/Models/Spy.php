<?php


namespace MilitaryElite\Models;


use MilitaryElite\Models\Contracts\SpyInterface;

class Spy extends Soldier implements SpyInterface
{
    private $codeNumber;

    public function __construct(int $id, string $firstName, string $lastName, string $codeNumber)
    {
        parent::__construct($id, $firstName, $lastName);

        $this->setCodeNumber($codeNumber);
    }

    public function getCodeNumber(): string
    {
        return $this->codeNumber;
    }

    public function setCodeNumber(string $codeNumber)
    {
        $this->codeNumber = $codeNumber;
    }

    function __toString()
    {
        return parent::__toString() . PHP_EOL
            . "Code Number: {$this->getCodeNumber()}";
    }
}