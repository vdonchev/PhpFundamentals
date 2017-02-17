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

    public function getPersonByName(string $firstName, string $lastName)
    {
        if (array_key_exists($firstName . $lastName, $this->personsByName)) {
            return $this->personsByName[$firstName . $lastName];
        }

        return null;
    }

    public function getPersonByDate(string $date)
    {
        if (array_key_exists($date, $this->personsByBirthDate)) {
            return $this->personsByBirthDate[$date];
        }

        return null;
    }

    public function addPerson(Person $person)
    {
        $this->personsByName[$person->getFullName()] = $person;
        $this->personsByBirthDate[$person->getBirthDate()] = $person;
    }
}