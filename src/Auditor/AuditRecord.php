<?php

declare(strict_types=1);

namespace Auditor;

use DateTime;

class AuditRecord
{

    private int $id;

    private AuditUser $auditUser;

    private AuditEvent $auditEvent;

    private string $ipAddress;

    private DateTime $createdAt;

}