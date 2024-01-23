<?php

namespace Auditor;

class Environment
{

    const ENVIRONMENT_FILE = '.env';

    const DB_DIR = 'db';

    const DOLPHIN_DIR = 'dolphin';

    const ENV_AUDITOR_DATABASE_URL = 'AUDITOR_DATABASE_URL';

    const SCHEME_MYSQL = 'mysql';

    const COLON = ':';

    const SLASHES = '//';

    const SLASH = '/';

    const AT = '@';

    const QUESTION_MARK = '?';

    public static function parseDatabaseUrl(string $url): array
    {

        $environment = [];

        if (str_starts_with($url, self::SCHEME_MYSQL))
        {
            $environment[EnvironmentEnum::SCHEME->name] = self::SCHEME_MYSQL;
            $url = substr($url, strlen(self::SCHEME_MYSQL . self::COLON . self::SLASHES));
            $name = substr($url, 0, strpos($url, self::COLON));
            $environment[EnvironmentEnum::USER->name] = $name;
            $url = substr($url, strlen($name . self::COLON));
            $password = substr($url, 0, strpos($url, self::AT));
            $environment[EnvironmentEnum::PASSWORD->name] = $password;
            $url = substr($url, strlen($password . self::AT));
            $host = substr($url, 0, strpos($url, self::COLON));
            $environment[EnvironmentEnum::HOST->name] = $host;
            $url = substr($url, strlen($host . self::COLON));
            $port = substr($url, 0, strpos($url, self::SLASH));
            $environment[EnvironmentEnum::PORT->name] = $port;
            $url = substr($url, strlen($port . self::SLASH));
            $database = substr($url, 0, strpos($url, self::QUESTION_MARK));
            $environment[EnvironmentEnum::DATABASE->name] = $database;
            // TODO: Implement options parsing.
        }

        return $environment;
    }

}