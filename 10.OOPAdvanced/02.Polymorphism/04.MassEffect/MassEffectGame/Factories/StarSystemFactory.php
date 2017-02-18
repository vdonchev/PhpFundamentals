<?php


namespace MassEffectGame\Factories;


use MassEffectGame\Exceptions\GameException;
use MassEffectGame\Helpers\Messages;
use MassEffectGame\Models\StarSystem;
use MassEffectGame\Models\StarSystemInterface;

class StarSystemFactory
{
    /**
     * StarSystemFactory constructor.
     */
    private function __construct()
    {
    }

    /**
     * @param string $name
     * @return StarSystemInterface
     * @throws GameException
     */
    public static function produce(string $name): StarSystemInterface
    {
        switch ($name) {
            case "Artemis-Tau":
                return new StarSystem($name, ["Serpent-Nebula" => 50, "Kepler-Verge" => 120]);
            case "Serpent-Nebula":
                return new StarSystem($name, ["Artemis-Tau" => 50, "Hades-Gamma" => 360]);
            case "Hades-Gamma":
                return new StarSystem($name, ["Serpent-Nebula" => 360, "Kepler-Verge" => 145]);
            case "Kepler-Verge":
                return new StarSystem($name, ["Hades-Gamma" => 145, "Artemis-Tau" => 120]);
            default:
                throw new GameException(Messages::INVALID_STAR_SYSTEM_NAME);
        }
    }
}