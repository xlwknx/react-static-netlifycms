<?php
namespace VirgilSecurity\Customizer\Fields;


use VirgilSecurity\Customizer\Src\Field;

class ImageField extends Field
{
    protected $type = 'image';

    protected $sanitizeCallback = 'esc_url';
}
