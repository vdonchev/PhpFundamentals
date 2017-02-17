<?php


namespace FamilyApp\Models;


class FamilyTree
{
    /**
     * @var $personsByName Person[]
     */
    private $personsByName = [];

    /**
     * @var $familyMembersByDate Person[]
     */
    private $personsByBirthDate = [];

    public function getPersonByName(string $firstName, string $lastName): Person
    {
        return $this->personsByName[$firstName . $lastName];
    }

    public function getPersonByDate(string $date): Person
    {
        return $this->personsByBirthDate[$date];
    }

    public function addPerson(Person $person)
    {
        $this->personsByName[$person->getFullName()] = $person;
        $this->personsByBirthDate[$person->getBirthDate()] = $person;
    }
}