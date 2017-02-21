<?php

namespace FoodShortage;

interface BuyerInterface
{
    public function BuyFood();

    public function getFood(): int;

    public function setFood(int $foodQuantity);
}