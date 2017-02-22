<?php


namespace Collections;


class AddRemoveCollection extends Collection implements AddInterface, RemoveInterface
{
    public function Add(string $element): int
    {
        array_unshift($this->elements, $element);

        return 0;
    }

    public function remove(): string
    {
        return array_pop($this->elements);
    }
}