<?php

// autoload from inc directory
spl_autoload_register(
    function ($class) {

        $parts = explode('\\', $class);

        if (is_array($parts) && strtolower($parts[0]) == 'virgilsecurity') {

            $parts = array_map(
                function ($value) {
                    return strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $value));
                },
                array_slice($parts, 1)
            );

            include implode(DIRECTORY_SEPARATOR, $parts) . '.php';
        }
    }
);
