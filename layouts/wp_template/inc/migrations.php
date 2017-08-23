<?php

namespace VirgilSecurity;


use DirectoryIterator;

class Migrations
{
    const MIGRATIONS_DIR = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'migrations';

    const MIGRATION_TIMESTAMP_MOD = "migration_timestamp";


    public function migrate()
    {
        $dir = new DirectoryIterator(self::MIGRATIONS_DIR);
        $sortedMigrations = [];

        foreach ($dir as $fileinfo) {
            if (!$fileinfo->isDot()) {

                $sortedMigrations[$fileinfo->getBasename(".php")] = [
                    'timestamp' => $fileinfo->getBasename(".php"),
                    'filepath'  => $fileinfo->getRealPath(),
                ];
            }
        }

        ksort($sortedMigrations);

        $lastMigrationTimestamp = get_theme_mod(self::MIGRATION_TIMESTAMP_MOD, 0);

        array_map(
            function (array $migrationFile) use (&$lastMigrationTimestamp) {

                $migrationTimestamp = $migrationFile['timestamp'];

                if ($lastMigrationTimestamp < $migrationTimestamp) {
                    require $migrationFile['filepath'];

                    $lastMigrationTimestamp = $migrationTimestamp;
                }
            },
            $sortedMigrations
        );

        set_theme_mod(self::MIGRATION_TIMESTAMP_MOD, $lastMigrationTimestamp);
    }


    public function reset()
    {
        set_theme_mod(self::MIGRATION_TIMESTAMP_MOD, 0);
    }
}
