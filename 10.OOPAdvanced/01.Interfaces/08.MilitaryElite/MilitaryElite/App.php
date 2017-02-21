<?php


namespace MilitaryElite;


use MilitaryElite\Factories\SoldierFactory;
use MilitaryElite\Factories\ToolsFactory;

class App
{
    private $soldierFactory;
    private $toolsFactory;

    public function __construct(SoldierFactory $soldierFactory, ToolsFactory $toolsFactory)
    {
        $this->soldierFactory = $soldierFactory;
        $this->toolsFactory = $toolsFactory;
    }

    public function run()
    {
        // todo
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