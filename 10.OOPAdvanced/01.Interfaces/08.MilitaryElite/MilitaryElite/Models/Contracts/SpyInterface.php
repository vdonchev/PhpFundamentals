<?php


namespace MilitaryElite\Models\Contracts;


interface SpyInterface
{
    public function getCodeNumber(): string;

    public function setCodeNumber(string $codeNumber);
}