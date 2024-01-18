<?php

namespace Auditor;

use Auditor\Handler\BlackHoleHandler;
use PHPUnit\Framework\TestCase;

class TrackerTest extends TestCase
{

    public function testWithBlackHoleHandler()
    {
        $blackHoleHandler = new BlackHoleHandler();
        $tracker = new Tracker($blackHoleHandler);
        $this->assertInstanceOf(BlackHoleHandler::class, $tracker->getHandler());
    }

}