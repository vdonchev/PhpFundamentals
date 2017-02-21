<?php

namespace PersonInterface;

interface PersonInterface
{
    public function getName(): string;

    public function setName(string $name);

    public function getAge(): int;

    public function setAge(int $age);
}