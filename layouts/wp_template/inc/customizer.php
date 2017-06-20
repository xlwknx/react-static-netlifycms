<?php

use VirgilSecurity\Customizer\HeaderSection\Fields\LogoImageField;
use VirgilSecurity\Customizer\HeaderSection\Fields\MenuCodeField;

use VirgilSecurity\Customizer\HeaderSection\Groups\AuthLinksGroup;

use VirgilSecurity\Customizer\HeaderSection\HeaderSection;

use VirgilSecurity\Customizer\VirgilSecurityConfig;

/**
 * @param $wp_customize WP_Customize_Manager
 */
function virgilsecurity_customize_register($wp_customize)
{
    $config = VirgilsecurityConfig::create();

    $headerSection = new HeaderSection($config);

    $headerSection->addField(new LogoImageField());
    $headerSection->addField(new MenuCodeField());
    $headerSection->addField(new AuthLinksGroup());


    $headerSection->registerSection();

}

add_action('customize_register', 'virgilsecurity_customize_register');
