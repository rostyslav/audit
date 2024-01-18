<?php

declare(strict_types=1);

namespace Auditor;

use DateTime;

class AuditRecord
{

    private AuditUser $auditUser;

    private AuditEvent $auditEvent;

    private DateTime $createdAt;

    private string $ipAddress;

}