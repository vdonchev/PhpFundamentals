<?php

namespace PokemonApp\Models;

class Trainer
{
    private $name;
    private $badgesCount = 0;

    /**
     * @var Pokemon[]
     */
    private $pokemons = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBadgesCount(): int
    {
        return $this->badgesCount;
    }

    public function getPokemonCount(): int
    {
        return count($this->pokemons);
    }

    public function hasPokemonOfElement(string $element): bool
    {
        foreach ($this->pokemons as $name => $pokemon) {
            if ($pokemon->getElement() == $element) {
                return true;
            }
        }

        return false;
    }

    public function reducePokemonsHealth(int $value)
    {
        foreach ($this->pokemons as $name => $pokemon) {
            $pokemon->reduceHealth($value);
        }
    }

    public function removeDeadPokemons()
    {
        $this->pokemons = array_filter($this->pokemons, function (Pokemon $pokemon) {
            return $pokemon->isAlive();
        });
    }

    public function addBadge(int $badgesCount = 1)
    {
        $this->badgesCount += $badgesCount;
    }

    public function addPokemon(Pokemon $pokemon)
    {
        $this->pokemons[$pokemon->getName()] = $pokemon;
    }

    public function removePokemon(Pokemon $pokemon)
    {
        echo "REMOVED: {$pokemon->getName()}\n";
        unset($this->pokemons[$pokemon->getName()]);
    }

    public function __toString(): string
    {
        return "{$this->getName()} {$this->getBadgesCount()} {$this->getPokemonCount()}";
    }
}