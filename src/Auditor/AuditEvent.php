<?php

declare(strict_types=1);

namespace Auditor;

class AuditEvent
{

    private int $id;

    private EventType $eventType;

    private AuditEntity $auditEntity;

    private int $rowId;



}