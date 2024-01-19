<?php

declare(strict_types=1);

namespace Auditor;

use Auditor\Handler\BlackHoleHandler;
use PHPUnit\Framework\TestCase;

class TrackerTest extends TestCase
{

    public function testWithBlackHoleHandler(): void
    {
        $blackHoleHandler = new BlackHoleHandler();
        $tracker = new Tracker($blackHoleHandler);
        $this->assertInstanceOf(BlackHoleHandler::class, $tracker->getHandler());
    }

}