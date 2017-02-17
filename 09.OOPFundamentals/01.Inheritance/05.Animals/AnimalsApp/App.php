<?php


namespace AnimalsApp;


use AnimalsApp\Models\Animal;
use AnimalsApp\Models\Cat;
use AnimalsApp\Models\Dog;
use AnimalsApp\Models\Frog;
use AnimalsApp\Models\Kitten;
use AnimalsApp\Models\Tomcat;

class App
{
    const END = "Beast!";
    const DELIMITER = " ";

    /**
     * @var $animals Animal[]
     */
    private $animals = [];

    public function start()
    {
        $this->processInput();
        $this->printOutput();
    }

    private function processInput()
    {
        while (true) {
            $input = explode(self::DELIMITER, $this->readLine());
            if ($input[0] === self::END) {
                break;
            }

            try {
                $animalData = explode(self::DELIMITER, $this->readLine());

                $className = "AnimalsApp\\Models\\{$input[0]}";
                switch ($input[0]) {
                    case "Cat":
                        $this->animals[] = new Cat($animalData[0], intval($animalData[1]), $animalData[2]);
                        break;
                    case "Dog":
                        $this->animals[] = new Dog($animalData[0], intval($animalData[1]), $animalData[2]);
                        break;
                    case "Frog":
                        $this->animals[] = new Frog($animalData[0], intval($animalData[1]), $animalData[2]);
                        break;
                    case "Kitten":
                        $this->animals[] = new Kitten($animalData[0], intval($animalData[1]), $animalData[2]);
                        break;
                    case "Tomcat":
                        $this->animals[] = new Tomcat($animalData[0], intval($animalData[1]), $animalData[2]);
                        break;
                }

            } catch (\Exception $ex) {
                $this->writeLine($ex->getMessage());
            }
        }
    }

    private function printOutput()
    {
        foreach ($this->animals as $animal) {
            $this->writeLine($animal);
        }
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