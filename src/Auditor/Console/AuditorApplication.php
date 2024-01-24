<?php

declare(strict_types=1);

namespace Auditor\Console;

use Auditor\Console\Command\InitCommand;
use Auditor\Console\Command\UpdateCommand;

class AuditorApplication
{

    private array $commands = [
        InitCommand::class,
        UpdateCommand::class
    ];

    public function launch(): int
    {
        printf("Auditor\n\n"); //TODO: Show auditor version

        printf("Available commands:\n");
        foreach ($this->getAvailableCommands() as $name => $description) {
            printf("  %-10s %s\n", $name, $description);
        }
        return 0;
    }

    private function getAvailableCommands(): array
    {
        $availableCommands = [];
        foreach ($this->commands as $command) {
            $commandObject = new $command();
            $availableCommands[$commandObject->getName()] = $commandObject->getDescription();
        }
        return $availableCommands;
    }

}