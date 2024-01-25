<?php

namespace Auditor\Console\Command;

use Auditor\Console\AuditorApplication;

class HelpCommand extends AuditorCommand
{

    public static string $name = 'help';

    public static string $description = 'Show help';

    public function run(): int
    {
        printf("Available commands:\n");

        foreach (AuditorCommand::$commands as $command) {
            printf("  %-10s %s\n", $command::$name, $command::$description);
        }
        return 0;
    }
}