<?php


namespace PizzaApp\Models;


class Dough
{
    const CALORIES_PER_GRAM = 2;
    const DOUGH_TYPES = [
        "White" => 1.5,
        "Wholegrain" => 1.
    ];

    const BAKING_TECHNIQUES = [
        "Crispy" => .9,
        "Chewy" => 1.1,
        "Homemade" => 1.
    ];

    private $type;
    private $bakingTechnique;
    private $weight;

    public function __construct(string $type, string $bakingTechnique, int $weight)
    {
        $this->setType($type);
        $this->setBakingTechnique($bakingTechnique);
        $this->setWeight($weight);
    }

    public function setType($type)
    {
        if (!array_key_exists($type, self::DOUGH_TYPES)) {
            throw new \Exception("Invalid type of dough.");
        }

        $this->type = $type;
    }

    public function setBakingTechnique($bakingTechnique)
    {
        $this->bakingTechnique = $bakingTechnique;
    }

    public function setWeight($weight)
    {
        if ($weight < 1 || $weight > 200) {
            throw new \Exception("Dough weight should be in the range [1..200].");
        }

        $this->weight = $weight;
    }

    public function getCalories(): float
    {
        return $this->weight
            * self::CALORIES_PER_GRAM
            * self::DOUGH_TYPES[$this->type]
            * self::BAKING_TECHNIQUES[$this->bakingTechnique];
    }
}