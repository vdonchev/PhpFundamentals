<?php


namespace CatLadyApp;


use CatLadyApp\Cats\Cat;
use CatLadyApp\Cats\Cymric;
use CatLadyApp\Cats\Siamese;
use CatLadyApp\Cats\StreetExtraordinaire;

class App
{
    /**
     * @var Cat[] $cats
     */
    private $cats = [];

    public function start()
    {
        $this->processInput();
        $this->printOutput($this->readLine());
    }

    private function processInput()
    {
        while (true) {
            $input = $this->readLine();
            if ($input === "End") {
                break;
            }

            $input = explode(" ", $input);
            switch ($input[0]) {
                case "Siamese":
                    $this->addCat(new Siamese($input[1], intval($input[2])));
                    break;
                case "Cymric":
                    $this->addCat(new Cymric($input[1], intval($input[2])));
                    break;
                case "StreetExtraordinaire":
                    $this->addCat(new StreetExtraordinaire($input[1], intval($input[2])));
                    break;
                default:
                    throw new \Exception("Unknown cat type supplied!");
            }
        }
    }

    private function printOutput($catName)
    {
        $this->writeLine($this->getCatByName($catName));
    }

    private function addCat(Cat $cat)
    {
        $this->cats[$cat->getName()] = $cat;
    }

    private function getCatByName(string $name): Cat
    {
        return $this->cats[$name];
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