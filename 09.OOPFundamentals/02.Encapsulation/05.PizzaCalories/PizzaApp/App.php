<?php


namespace PizzaApp;


use PizzaApp\Models\Dough;
use PizzaApp\Models\Pizza;
use PizzaApp\Models\Topping;

class App
{
    const DELIMITER = " ";
    const END = "END";

    private $pizza;

    public function start()
    {
        $this->processInput();
    }

    private function processInput()
    {
        try {
            $pizzaTokens = explode(self::DELIMITER, $this->readLine());
            $this->pizza = new Pizza($this->toUppercaseFirst($pizzaTokens[1]), intval($pizzaTokens[2]));

            $doughTokens = explode(self::DELIMITER, $this->readLine());
            $dough = new Dough(
                $this->toUppercaseFirst($doughTokens[1]),
                $this->toUppercaseFirst($doughTokens[2]),
                intval($doughTokens[3]));

            $this->pizza->setDough($dough);

            while (true) {
                $toppingData = explode(self::DELIMITER, $this->readLine());
                if ($toppingData[0] === self::END) {
                    break;
                }

                $topping = new Topping($this->toUppercaseFirst($toppingData[1]), intval($toppingData[2]));
                $this->pizza->addTopping($topping);
            }

            $this->printOutput();

        } catch (\Exception $ex) {
            $this->writeLine($ex->getMessage());
        }
    }

    private function printOutput()
    {
        $this->writeLine($this->pizza);
    }

    private function toUppercaseFirst(string $text): string
    {
        return ucfirst(strtolower($text));
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