<?php

namespace Auditor;

enum EnvironmentEnum: int
{

    case SCHEME = 0;

    case USER = 1;

    case PASSWORD = 2;

    case HOST = 3;

    case PORT = 4;

    case DATABASE = 5;

}
