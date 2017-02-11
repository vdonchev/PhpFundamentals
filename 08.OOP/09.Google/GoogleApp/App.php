<?php

namespace GoogleApp;

use GoogleApp\Models\Car;
use GoogleApp\Models\Company;
use GoogleApp\Models\Person;
use GoogleApp\Models\Pokemon;
use GoogleApp\Models\Relative;

class App
{
    const END_OF_INPUT = "End";

    /**
     * @var Person[]
     */
    private $persons = [];

    public function start()
    {
        $this->processInput();
    }

    private function processInput()
    {
        while (true) {
            $line = $this->readLine();
            if ($line === self::END_OF_INPUT) {
                break;
            }

            $tokens = explode(" ", $line);
            $personName = array_shift($tokens);

            $person = null;
            if ($this->personExists($personName)) {
                $person = $this->getPersonByName($personName);
            } else {
                $person = new Person($personName);
                $this->addPerson($person);
            }

            $this->addPersonDetail($person, $tokens);
        }

        $personToLookFor = $this->readLine();
        echo $this->getPersonByName($personToLookFor);
    }

    private function addPersonDetail(Person $person, array $data)
    {
        $type = array_shift($data);
        switch ($type) {
            case "company":
                $person->setCompany(new Company($data[0], $data[1], floatval($data[2])));
                break;
            case "car":
                $person->setCar(new Car($data[0], intval($data[1])));
                break;
            case "pokemon":
                $person->addPokemon(new Pokemon(...$data));
                break;
            case "parents":
                $person->addParent(new Relative(...$data));
                break;
            case "children":
                $person->addChild(new Relative(...$data));
                break;
            default:
                throw new \Exception("Invalid Command!");
                break;
        }
    }

    private function addPerson(Person $person)
    {
        $this->persons[$person->getName()] = $person;
    }

    private function personExists(string $name): bool
    {
        return array_key_exists($name, $this->persons);
    }

    private function getPersonByName(string $name): Person
    {
        return $this->persons[$name];
    }

    private function readLine(): string
    {
        return trim(fgets(STDIN));
    }
}