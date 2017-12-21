<?php

namespace VirgilSecurity\Customizer;


use Kirki;

use VirgilSecurity\Customizer\Src\ConfigInterface;

class VirgilSecurityConfig implements ConfigInterface
{
    private static $instance;

    private $configName = 'virgilsecurity';


    private function __construct()
    {
        Kirki::add_config(
            $this->configName,
            [
                'capability'  => 'edit_theme_options',
                'option_type' => 'theme_mod',
            ]
        );
    }


    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    function getName()
    {
        return $this->configName;
    }
}
