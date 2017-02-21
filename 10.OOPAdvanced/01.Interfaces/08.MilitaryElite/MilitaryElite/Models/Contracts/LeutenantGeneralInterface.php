<?php


namespace MilitaryElite\Models\Contracts;


interface LeutenantGeneralInterface
{
    public function addPrivate(PrivateSoldierInterface $soldier);

    /**
     * @return PrivateSoldierInterface[]
     */
    public function getPrivates(): array ;
}