<?php


namespace Collections;


class AddCollection extends Collection implements AddInterface
{
    public function Add(string $element): int
    {
        return array_push($this->elements, $element) - 1;
    }
}