<?php


namespace MassEffectGame\Game;


use MassEffectGame\Exceptions\GameException;
use MassEffectGame\Factories\CommandFactory;
use MassEffectGame\Game\Commands\CommandInterface;
use MassEffectGame\Helpers\Messages;
use MassEffectGame\IO\IOInterface;
use MassEffectGame\Models\GalaxyInterface;

class GameEngine implements GameEngineInterface
{
    private $galaxy;

    /**
     * @var CommandInterface[]
     */
    private $commands;
    private $io;

    /**
     * GameEngine constructor.
     * @param GalaxyInterface $galaxy
     * @param IOInterface $io
     */
    public function __construct(GalaxyInterface $galaxy, IOInterface $io)
    {
        $this->galaxy = $galaxy;
        $this->io = $io;
    }

    public function run()
    {
        try {
            $this->produceCommands();
            $this->readInput();
        } catch (GameException $gameException) {
            $this->io->writeLine($gameException->getMessage());
        } catch (\Exception $exception) {
            $this->io->writeLine($exception->getMessage());
        }
    }

    /**
     * @return GalaxyInterface
     */
    public function getGalaxy(): GalaxyInterface
    {
        return $this->galaxy;
    }

    private function readInput()
    {
        while (true) {
            try {
                $input = $this->io->readLine();
                if ($input === Messages::END) {
                    break;
                }

                $result = $this->processCommand($input);

                foreach ($result as $row) {
                    $this->io->writeLine($row);
                }

            } catch (GameException $gameException) {
                $this->io->writeLine($gameException->getMessage());
            } catch (\Exception $exception) {
                $this->io->writeLine($exception->getMessage());
            }
        }
    }

    private function processCommand(string $input)
    {
        $args = explode(Messages::DELIMITER, $input);
        $name = array_shift($args);

        $command = $this->commands[$name];
        return $command->execute($this, $args);
    }

    private function produceCommands()
    {
        $commandNames = ["create", "attack", "plot-jump", "status-report", "system-report"];

        foreach ($commandNames as $commandName) {
            $this->commands[$commandName] = CommandFactory::produce($commandName);
        }
    }
}