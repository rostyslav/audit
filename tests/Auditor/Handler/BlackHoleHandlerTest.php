<?php

namespace Auditor\Handler;

use PHPUnit\Framework\TestCase;

class BlackHoleHandlerTest extends TestCase
{

    public function testInit()
    {
        $blackHole = new BlackHoleHandler();
        $this->assertInstanceOf(BlackHoleHandler::class, $blackHole);
    }

}
