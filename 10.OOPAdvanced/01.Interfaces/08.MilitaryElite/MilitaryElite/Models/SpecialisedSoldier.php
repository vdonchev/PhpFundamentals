<?php


namespace MilitaryElite\Models;


use MilitaryElite\Models\Contracts\SpecialisedSoldierInterface;

abstract class SpecialisedSoldier extends PrivateSoldier implements SpecialisedSoldierInterface
{
    const VALID_CORPS_NAMES = ["Airforces", "Marines"];

    private $corps;

    public function __construct(int $id,
                                string $firstName,
                                string $lastName,
                                float $salary,
                                string $corps)
    {
        parent::__construct($id, $firstName, $lastName, $salary);

        $this->setCorps($corps);
    }

    public function setCorps(string $corps)
    {
        if (!in_array($corps, self::VALID_CORPS_NAMES)) {
            throw new \Exception("Invalid corps supplied");
        }

        $this->corps = $corps;
    }

    public function getCorps(): string
    {
        return $this->corps;
    }
}