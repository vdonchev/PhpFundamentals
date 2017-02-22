<?php


namespace Collections;


class MyList extends Collection implements AddInterface, RemoveInterface, UsedInterface
{
    public function Add(string $element): int
    {
        array_unshift($this->elements, $element);

        return 0;
    }

    public function remove(): string
    {
        return array_shift($this->elements);
    }

    public function used(): int
    {
        return count($this->elements);
    }
}