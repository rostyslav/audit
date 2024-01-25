<?php

namespace Auditor\Console\Command;

use Auditor\Environment;

class InitCommand extends AuditorCommand
{

    public static string $name = 'init';

    public static string $description = 'Initialise handler for use with Auditor';

    public function run(): int
    {

        return 0;
    }

}