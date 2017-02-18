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
                        if (strtolower($animalData[2]) == "male") {
                            throw new \Exception("Invalid input!");
                        }

                        $this->animals[] = new Kitten($animalData[0], intval($animalData[1]), $animalData[2]);
                        break;
                    case "Tomcat":
                        if (strtolower($animalData[2]) == "female") {
                            throw new \Exception("Invalid input!");
                        }

                        $this->animals[] = new Tomcat($animalData[0], intval($animalData[1]), $animalData[2]);
                        break;
                    default:
                        throw new \Exception("Invalid input!");
                }

            } catch (\Exception $ex) {
                $this->writeLine($ex->getMessage());
                exit;
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