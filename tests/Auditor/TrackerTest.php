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
        $environmentFile = Environment::ENVIRONMENT_FILE;
        $this->assertTrue(file_exists($environmentFile), 'Environment file does not exists.');
        $environment = parse_ini_file($environmentFile);
        $this->assertIsArray($environment);
        $dolphinHandler = new DolphinHandler(
            $environment[EnvironmentEnum::MYSQL_HOST->name],
            $environment[EnvironmentEnum::MYSQL_USER->name],
            $environment[EnvironmentEnum::MYSQL_PASSWORD->name],
            $environment[EnvironmentEnum::MYSQL_DATABASE->name],
            intval($environment[EnvironmentEnum::MYSQL_PORT->name])
        );
        $tracker = new Tracker($dolphinHandler);
        $this->assertInstanceOf(DolphinHandler::class, $tracker->getHandler());
    }

}