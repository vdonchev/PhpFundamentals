<?php


namespace GandalfApp\Models;


use GandalfApp\Helpers\Validator;

class Mood
{
    private $points = 0;

    public function getPoints(): int
    {
        return $this->points;
    }

    public function getStatus(): string
    {
        if (Validator::validateNumInRange($this->points, PHP_INT_MIN, -4)) {
            return "Angry";
        }

        if (Validator::validateNumInRange($this->points, -5, -1)) {
            return "Sad";
        }

        if (Validator::validateNumInRange($this->points, 0, 15)) {
            return "Happy";
        }

        return "PHP";
    }

    public function update(int $value)
    {
        $this->points += $value;
    }
}