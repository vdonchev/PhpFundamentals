<?php


namespace MilitaryElite\Models;


use MassEffectGame\Models\Projectiles\ProjectileInterface;
use MilitaryElite\Models\Contracts\LeutenantGeneralInterface;
use MilitaryElite\Models\Contracts\PrivateSoldierInterface;

class LeutenantGeneral extends PrivateSoldier implements LeutenantGeneralInterface
{
    /**
     * @var $privates ProjectileInterface[]
     */
    private $privates = [];

    public function addPrivate(PrivateSoldierInterface $soldier)
    {
        $this->privates[] = $soldier;
    }

    /**
     * @return PrivateSoldierInterface[]
     */
    public function getPrivates(): array
    {
        return $this->privates;
    }
}