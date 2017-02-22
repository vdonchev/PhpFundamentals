<?php


namespace Mood3;


interface CharacterInterface
{
    public function getUsername(): string;

    public function setUsername(string $username);

    public function getHashedPassword(): string;

    public function getLevel(): int;

    public function setLevel(int $level);

    public function getSpecialPoints();

    public function setSpecialPoints($points);
}