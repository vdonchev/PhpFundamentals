<?php


namespace Mood3;


abstract class CharacterBase implements CharacterInterface
{
    protected $hashedPassword;

    private $username;
    private $level;

    public function __construct(string $username, int $level)
    {
        $this->setUsername($username);
        $this->setLevel($level);
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function setLevel(int $level)
    {
        $this->level = $level;
    }

    public function getHashedPassword(): string
    {
        return $this->hashedPassword;
    }

    function __toString()
    {
        return '"' . $this->getUsername() . '" | "' . $this->getHashedPassword() . '" -> ' . basename(get_class($this));
    }
}