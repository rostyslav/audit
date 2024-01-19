<?php

declare(strict_types=1);

namespace Auditor\Handler;

use Exception;

use mysqli;

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
        $result = $this->conn->query('SHOW TABLES');
        if ($result->num_rows === 0) {
            if($this->migrate() === false) {
                throw new Exception("Auditor migration failed.");
            }
        }
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

    private function migrate(int $version = 0): bool {
        $result = true;
        if ($version === 0) {
            // TODO: Apply migrations.
        }
        return $result;
    }
}