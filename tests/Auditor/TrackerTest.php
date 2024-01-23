<?php

declare(strict_types=1);

namespace Auditor;

use Auditor\Handler\BlackHoleHandler;
use Auditor\Handler\DolphinHandler;
use PHPUnit\Framework\TestCase;

class TrackerTest extends TestCase
{

    public function testWithBlackHoleHandler(): void
    {
        $blackHoleHandler = new BlackHoleHandler();
        $tracker = new Tracker($blackHoleHandler);
        $this->assertInstanceOf(BlackHoleHandler::class, $tracker->getHandler());
    }

    public function testWithDolphinHandler(): void
    {
        $this->assertTrue(file_exists(Environment::ENVIRONMENT_FILE), 'Environment file does not exists.');
        $environmentConfiguration = parse_ini_file(Environment::ENVIRONMENT_FILE);
        $this->assertIsArray($environmentConfiguration);
        $environment = Environment::parseDatabaseUrl($environmentConfiguration[Environment::ENV_AUDITOR_DATABASE_URL]);
        $dolphinHandler = new DolphinHandler(
            $environment[EnvironmentEnum::HOST->name],
            $environment[EnvironmentEnum::USER->name],
            $environment[EnvironmentEnum::PASSWORD->name],
            $environment[EnvironmentEnum::DATABASE->name],
            intval($environment[EnvironmentEnum::PORT->name])
        );
        $tracker = new Tracker($dolphinHandler);
        $this->assertInstanceOf(DolphinHandler::class, $tracker->getHandler());
    }

}