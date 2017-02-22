<?php


namespace MilitaryElite\Models;


use MassEffectGame\Models\Projectiles\ProjectileInterface;
use MilitaryElite\Models\Contracts\LeutenantGeneralInterface;
use MilitaryElite\Models\Contracts\PrivateSoldierInterface;
use MilitaryElite\Models\Contracts\SoldierInterface;

class LeutenantGeneral extends PrivateSoldier implements LeutenantGeneralInterface
{
    /**
     * @var $privates ProjectileInterface[]
     */
    private $privates = [];

    /**
     * @return PrivateSoldierInterface[]
     */
    public function getPrivates(): array
    {
        return $this->privates;
    }

    function __toString()
    {
        $output = parent::__toString() . PHP_EOL
            . "Privates:" . PHP_EOL;

        foreach ($this->getPrivates() as $private) {
            $output .= "  {$private}" . PHP_EOL;
        }

        return trim($output);
    }

    public function addPrivate(SoldierInterface $soldier)
    {
        $this->privates[] = $soldier;
    }
}