<?php

declare(strict_types=1);

namespace Auditor\Console;

use Auditor\Console\Command\AuditorCommand;
use Auditor\Console\Command\HelpCommand;

class AuditorApplication
{

    private array $arguments;

    private static AuditorApplication $application;

    public static function getInstance(): AuditorApplication
    {
        if(!isset(self::$application)) {
            self::$application = new AuditorApplication();
        }
        return self::$application;
    }

    public function setArguments(array $arguments): void
    {
        $this->arguments = $arguments;
    }

    public function run(): int
    {
        printf("Auditor\n\n"); //TODO: Show auditor version

        $currentCommand = HelpCommand::class;

        if(isset($this->arguments[1])) {
            $commandName = $this->arguments[1];
            foreach (AuditorCommand::$commands as $command) {
                if ($command::$name === $commandName) {
                    $currentCommand = $command;
                    break;
                }
            }
        }

        $commandObject = new $currentCommand();
        $commandObject->run();

        return 0;
    }

}