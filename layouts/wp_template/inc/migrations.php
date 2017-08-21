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
        $lastMigrationTimestamp = get_theme_mod(self::MIGRATION_TIMESTAMP_MOD, 0);
        foreach ($dir as $fileinfo) {
            if (!$fileinfo->isDot()) {
                $migrationTimestamp = $fileinfo->getBasename(".php");

                if ($lastMigrationTimestamp < $migrationTimestamp) {
                    require $fileinfo->getRealPath();

                    $lastMigrationTimestamp = $migrationTimestamp;
                }
            }
        }

        set_theme_mod(self::MIGRATION_TIMESTAMP_MOD, $lastMigrationTimestamp);
    }


    public function reset()
    {
        set_theme_mod(self::MIGRATION_TIMESTAMP_MOD, 0);
    }
}
