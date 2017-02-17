<?php


namespace PizzaApp\Models;


class Pizza
{
    private $name;
    private $numberOfToppings;

    /**
     * @var Dough $dough
     */
    private $dough;

    /**
     * @var Topping[] $toppings
     */
    private $toppings = [];

    public function __construct(string $name, int $numberOfToppings)
    {
        $this->setName($name);
        $this->setNumberOfToppings($numberOfToppings);
    }

    public function setName(string $name)
    {
        if (empty($name) ||
            (strlen($name) < 1 || strlen($name) > 15)) {
            throw new \Exception("Pizza name should be between 1 and 15 symbols.");
        }

        $this->name = $name;
    }

    public function setNumberOfToppings($numberOfToppings)
    {
        if ($numberOfToppings < 0 || $numberOfToppings > 10) {
            throw new \Exception("Number of toppings should be in range [0..10].");
        }

        $this->numberOfToppings = $numberOfToppings;
    }

    public function setDough(Dough $dough)
    {
        $this->dough = $dough;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getNumberOfToppings(): int
    {
        return $this->numberOfToppings;
    }

    public function getTotalCalories(): float
    {
        $calories = $this->dough->getCalories();
        foreach ($this->toppings as $topping) {
            $calories += $topping->getCalories();
        }

        return $calories;
    }

    public function addTopping(Topping $topping)
    {
        $this->toppings[] = $topping;
    }

    function __toString(): string
    {
        $caloriesFormatted = number_format($this->getTotalCalories(), 2);
        return "{$this->getName()} - {$caloriesFormatted} Calories.";
    }
}