<?php

declare(strict_types=1);

namespace Auditor\Handler;

use Auditor\AuditRecord;

interface Handleable
{

    public function init(): void;

    public function handle(AuditRecord $auditRecord): bool;

    public function close(): bool;

}