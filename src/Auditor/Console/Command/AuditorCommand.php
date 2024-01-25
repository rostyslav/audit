<?php

namespace Auditor\Console\Command;

abstract class AuditorCommand
{

    public static array $commands = [
        HelpCommand::class,
        InitCommand::class,
        UpdateCommand::class
    ];

    public static string $name;

    public static string $description;

    public abstract function run(): int;

}