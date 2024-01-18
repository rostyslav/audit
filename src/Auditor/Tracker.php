<?php

declare(strict_types=1);

namespace Auditor;

use Auditor\Handler\Handleable;

/**
 * Audition tracker
 *
 * Implements functionality for audit trail creation.
 *
 * @author Rostyslav Rava
 */
class Tracker
{

    private Handleable $handler;

    public function __construct(Handleable $handler)
    {
        $this->handler = $handler;
    }

    /**
     * Adding track record.
     *
     * @param AuditRecord $auditRecord
     * @return void
     */
    public function track(AuditRecord $auditRecord): void
    {
        $this->handler->handle($auditRecord);
    }

    public function getHandler(): Handleable
    {
        return $this->handler;
    }

}