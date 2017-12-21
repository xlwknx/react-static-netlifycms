<?php
namespace VirgilSecurity\Customizer\Fields;


use VirgilSecurity\Customizer\Src\Field;

class LinkField extends Field
{
    protected $type = 'text';

    protected $sanitizeCallback = 'esc_url';
}
