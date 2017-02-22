<?php


namespace MilitaryElite\Models\Contracts;


interface LeutenantGeneralInterface
{
    public function addPrivate(SoldierInterface $soldier);

    /**
     * @return PrivateSoldierInterface[]
     */
    public function getPrivates(): array ;
}