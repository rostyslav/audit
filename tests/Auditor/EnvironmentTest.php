<?php

declare(strict_types=1);

namespace Auditor;

use PHPUnit\Framework\TestCase;

class EnvironmentTest extends TestCase
{

    const TEST_AUDITOR_DATABASE_URL = Environment::SCHEME_MYSQL
        . Environment::COLON
        . Environment::SLASHES
        . self::TEST_USER
        . Environment::COLON
        . self::TEST_PASSWORD
        . Environment::AT
        . self::TEST_HOST
        . Environment::COLON
        . self::TEST_PORT
        . Environment::SLASH
        . self::TEST_DATABASE
        . "?charset=utf8mb4";

    const TEST_USER = 'auditor';

    const TEST_PASSWORD = 'qjgthybqntfnh';

    const TEST_HOST = 'db.farfaraway.galaxy';

    const TEST_DATABASE = 'auditor';

    const TEST_PORT = '3307';

    const TEST_OPTION_CHARSET = 'utf8mb4';

    public function testParse(): void
    {
        $environment = Environment::parseDatabaseUrl(self::TEST_AUDITOR_DATABASE_URL);
        $this->assertEquals(Environment::SCHEME_MYSQL, $environment[EnvironmentEnum::SCHEME->name]);
        $this->assertEquals(self::TEST_USER, $environment[EnvironmentEnum::USER->name]);
        $this->assertEquals(self::TEST_PASSWORD, $environment[EnvironmentEnum::PASSWORD->name]);
        $this->assertEquals(self::TEST_HOST, $environment[EnvironmentEnum::HOST->name]);
        $this->assertEquals(self::TEST_PORT, $environment[EnvironmentEnum::PORT->name]);
        $this->assertEquals(self::TEST_DATABASE, $environment[EnvironmentEnum::DATABASE->name]);
    }
}
