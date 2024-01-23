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

    const QUESTION = '?';

    const DELIMITERS = [self::COLON . self::SLASHES, self::COLON, self::AT, self::COLON, self::SLASH, self::QUESTION];

    public static function parseDatabaseUrl(string $url): array
    {

        $environment = [];

        // TODO: Implement options parsing.
        foreach (self::DELIMITERS as $id => $value) {
            $parameter = substr($url, 0, strpos($url, $value));
            $environment[EnvironmentEnum::from($id)->name] = $parameter;
            $url = substr($url, strlen($parameter . $value));
        }

        return $environment;
    }

}