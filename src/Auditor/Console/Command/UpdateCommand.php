<?php

namespace Auditor\Console\Command;

class UpdateCommand extends AuditorCommand
{

    public static string $name = 'update';

    public static string $description = 'Update handler for use with new Auditor version';

    public function run(): int
    {
        return 0;
    }

}