<?php declare(strict_types=1);

namespace App;

class Bootstrap
{
    public function __invoke(array $arguments): void
    {
        array_shift($arguments);

        if (!isset($arguments[0])) {
            throw new InvalidCommandException('No command specified');
        }

        $command = $arguments[0];
        $options = $this->handleOptions($arguments);
        if (!empty($options)) {
            $commandArguments = array_slice($arguments, 1 + (sizeof($options) * 2));
        } else {
            $commandArguments = array_slice($arguments, 1);
        }

        $this->runCommand($command, $commandArguments, $options);
    }

    private function runCommand(mixed $commandName, array $commandArguments, array $options): void
    {
        $command = new Command();

        switch ($commandName) {
            case 'teams':
                $command->teamsList($commandArguments);
                break;
            case 'games':
                $command->gamesList($commandArguments, $options);
                break;
            case 'help':
                $command->executeHelp();
                break;

            default:
                throw new InvalidCommandException('Such command does not exist: ' . $commandName);
        }
    }

    private function handleOptions(array $arguments): ?array
    {
        for ($i = 0; $i < sizeof($arguments); $i++) {
            if (substr($arguments[$i], 0, 2) === "--") {
                switch ($arguments[$i]) {
                    case '--filter':
                        return array("filter" => $arguments[$i + 1]);
                    default:
                        throw new InvalidOptionException('Such option does not exist: ' . $arguments[$i]);
                }
            }
        }
        return array();
    }
}
