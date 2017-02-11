<?php

namespace PokemonApp;

use PokemonApp\Models\Pokemon;
use PokemonApp\Models\Trainer;

class App
{
    const END_OF_DATA = "Tournament";
    const END_OF_TOURNAMENT = "End";

    /**
     * @var Trainer[]
     */
    private $trainers = [];

    public function start()
    {
        $this->processInput();
    }

    private function processInput()
    {
        while (true) {
            $line = $this->readLine();
            if ($line === self::END_OF_DATA) {
                break;
            }

            $tokens = explode(" ", $line);
            $trainer = null;
            if (!$this->trainerExists($tokens[0])) {
                $trainer = new Trainer($tokens[0]);
                $this->addTrainer($trainer);
            } else {
                $trainer = $this->getTrainerByName($tokens[0]);
            }

            $pokemon = new Pokemon($tokens[1], $tokens[2], intval($tokens[3]));
            $trainer->addPokemon($pokemon);
        }

        while (true) {
            $line = $this->readLine();
            if ($line === self::END_OF_TOURNAMENT) {
                break;
            }

            $element = $line;
            foreach ($this->trainers as $name => $trainer) {
                if ($trainer->hasPokemonOfElement($element)) {
                    $trainer->addBadge();
                } else {
                    $trainer->reducePokemonsHealth(10);
                    $trainer->removeDeadPokemons();
                }
            }
        }

        $this->printTrainers();
    }

    private function trainerExists(string $name): bool
    {
        return array_key_exists($name, $this->trainers);
    }

    private function addTrainer(Trainer $trainer)
    {
        $this->trainers[$trainer->getName()] = $trainer;
    }

    private function getTrainerByName(string $name): Trainer
    {
        return $this->trainers[$name];
    }

    private function printTrainers()
    {
        usort($this->trainers, function (Trainer $trainerA, Trainer $trainerB) {
            return -($trainerA->getBadgesCount() <=> $trainerB->getBadgesCount());
        });

        foreach ($this->trainers as $trainer) {
            $this->writeLine($trainer);
        }
    }

    private function readLine(): string
    {
        return trim(fgets(STDIN));
    }

    /**
     * @param $content mixed
     */
    private function writeLine($content)
    {
        echo $content . PHP_EOL;
    }
}