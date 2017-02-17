<?php


namespace GandalfApp;


use GandalfApp\Factories\FoodFactory;
use GandalfApp\Models\Wizard;

class App
{
    private $wizard;

    public function __construct(Wizard $wizard)
    {
        $this->wizard = $wizard;
    }

    public function start()
    {
        $this->processInput();
        $this->printOutput();
    }

    private function processInput()
    {
        $foods = explode(",", $this->readLine());
        foreach ($foods as $food) {
            $food = FoodFactory::create($food);
            $this->wizard->eat($food);
        }
    }

    private function printOutput()
    {
        $this->writeLine($this->wizard->getMood()->getPoints());
        $this->writeLine($this->wizard->getMood()->getStatus());
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