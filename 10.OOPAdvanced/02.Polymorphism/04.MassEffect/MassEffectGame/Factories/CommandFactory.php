<?php


namespace MassEffectGame\Factories;


use MassEffectGame\Exceptions\GameException;
use MassEffectGame\Game\Commands\AttackCommand;
use MassEffectGame\Game\Commands\CommandInterface;
use MassEffectGame\Game\Commands\CreateCommand;
use MassEffectGame\Game\Commands\PlotJumpCommand;
use MassEffectGame\Game\Commands\StatusReportCommand;
use MassEffectGame\Game\Commands\SystemReportCommand;
use MassEffectGame\Helpers\Messages;

class CommandFactory
{
    /**
     * CommandFactory constructor.
     */
    private function __construct()
    {
    }

    /**
     * @param $commandName
     * @return CommandInterface
     * @throws GameException
     */
    public static function produce($commandName): CommandInterface
    {
        switch ($commandName) {
            case "create":
                return new CreateCommand();
            case "attack":
                return new AttackCommand();
            case "plot-jump":
                return new PlotJumpCommand();
            case "status-report":
                return new StatusReportCommand();
            case "system-report":
                return new SystemReportCommand();
            default:
                throw new GameException(Messages::INVALID_COMMAND_NAME);
        }
    }
}