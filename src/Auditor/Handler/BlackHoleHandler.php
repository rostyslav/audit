<?php

namespace Auditor\Handler;

use Auditor\AuditRecord;

class BlackHoleHandler implements Handleable
{

    public function init(): void
    {
        // Awaiting supernova explosion.
    }

    public function handle(AuditRecord $auditRecord): bool
    {
        return true;
    }

    public function close(): bool
    {
        // Simply evaporate away.
        return true;
    }
}