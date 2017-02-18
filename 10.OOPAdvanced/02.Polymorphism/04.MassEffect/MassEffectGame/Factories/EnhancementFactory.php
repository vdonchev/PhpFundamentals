<?php


namespace MassEffectGame\Factories;


use MassEffectGame\Exceptions\GameException;
use MassEffectGame\Helpers\Messages;
use MassEffectGame\Models\Enhancements\EnhancementInterface;
use MassEffectGame\Models\Enhancements\ExtendedFuelCellsEnhancement;
use MassEffectGame\Models\Enhancements\KineticBarrierEnhancement;
use MassEffectGame\Models\Enhancements\ThanixCannonEnhancement;

class EnhancementFactory
{
    /**
     * EnhancementFactory constructor.
     */
    private function __construct()
    {
    }

    /**
     * @param $type
     * @return EnhancementInterface
     * @throws GameException
     */
    public static function produce($type): EnhancementInterface
    {
        switch ($type) {
            case "ThanixCannon":
                return new ThanixCannonEnhancement();
            case "KineticBarrier":
                return new KineticBarrierEnhancement();
            case "ExtendedFuelCells":
                return new ExtendedFuelCellsEnhancement();
            default:
                throw new GameException(Messages::INVALID_ENHANCEMENT_TYPE);
        }
    }
}