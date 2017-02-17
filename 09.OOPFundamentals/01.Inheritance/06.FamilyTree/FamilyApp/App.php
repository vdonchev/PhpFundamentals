<?php


namespace FamilyApp;


use FamilyApp\Models\FamilyTree;
use FamilyApp\Models\Person;

class App
{
    /**
     * @var Person
     */
    private $personToLookFor;
    private $familyTree;

    public function __construct()
    {
        $this->familyTree = new FamilyTree();
    }

    public function start()
    {
        $this->processInput();
        $this->printOutput();
    }

    private function processInput()
    {
        $relations = [];
        $relations[] = $this->readLine();

        while (true) {
            $input = $this->readLine();
            if ($input === "End") {
                break;
            }

            if (strstr($input, " - ") === false) {
                $person = new Person(...explode(" ", $input));
                $this->familyTree->addPerson($person);
            } else {
                $relations[] = $input;
            }
        }

        $needle = array_shift($relations);
        if ($this->isName($needle)) {
            $this->personToLookFor = $this->familyTree->getPersonByName(...explode(" ", $needle));
        } else {
            $this->personToLookFor = $this->familyTree->getPersonByDate($needle);
        }

        foreach ($relations as $relation) {
            $data = explode(" - ", $relation);
            $parent = $data[0];
            $child = $data[1];

            if ($this->isName($parent)) {
                $parent = $this->familyTree->getPersonByName(...explode(" ", $parent));
            } else {
                $parent = $this->familyTree->getPersonByDate($parent);
            }

            if ($this->isName($child)) {
                $child = $this->familyTree->getPersonByName(...explode(" ", $child));
            } else {
                $child = $this->familyTree->getPersonByDate($child);
            }

            if ($parent != null && $child != null) {
                $child->addParent($parent);
                $parent->addChild($child);
            }
        }
    }

    private function printOutput()
    {
        $this->writeLine($this->personToLookFor->getFullDetails());
    }

    private function isName(string $input): bool
    {
        return strstr($input, "/") === false;
    }

    private function readLine(): string
    {
        return trim(fgets(STDIN));
    }

    /**
     * @param $content mixed
     * @return void
     */
    private function writeLine($content)
    {
        echo $content . PHP_EOL;
    }
}