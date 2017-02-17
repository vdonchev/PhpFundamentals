<?php


namespace GandalfApp\Models;


use GandalfApp\Models\Foods\FoodBase;

class Wizard
{
    /**
     * @var FoodBase[] $foodsEaten
     */
    private $foodsEaten = [];
    private $mood;

    /**
     * Wizard constructor.
     * @param $mood
     */
    public function __construct(Mood $mood)
    {
        $this->mood = $mood;
    }

    public function eat(FoodBase $food)
    {
        $this->mood->update($food->getPoints());
        $this->foodsEaten[] = $food;
    }

    public function getMood(): Mood
    {
        return $this->mood;
    }
}