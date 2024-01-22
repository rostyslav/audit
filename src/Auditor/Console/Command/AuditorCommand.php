<?php

namespace Auditor\Console\Command;

abstract class AuditorCommand
{

    protected string $name;

    protected string $description;

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public abstract function execute();

}