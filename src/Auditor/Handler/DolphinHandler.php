<?php

declare(strict_types=1);

namespace Auditor\Handler;

use Auditor\AuditRecord;

class DolphinHandler implements Handleable
{

    private mysqli $conn;

    public function __construct($hostname, $username, $password, $database, $port = 3306)
    {
        // TODO:
        // Open database connection.
        $this->conn = new mysqli($hostname, $username, $password, $database, $port);
        // Check schema version.
        // Apply needed upgrades to match package version.
    }

    public function init(): void
    {
        // TODO:
        // Check that database is not empty.
        // Define database schema.
    }

    public function handle(AuditRecord $auditRecord): bool
    {
        // TODO:
        // Store audit record in database.
        return true;
    }

    public function close(): bool
    {
        // TODO:
        // Close database connection.
        return $this->conn->close();
    }
}