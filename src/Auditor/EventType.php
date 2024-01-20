<?php

declare(strict_types=1);

namespace Auditor;

enum EventType
{

    case create;

    case retrieve;

    case update;

    case delete;

}
