<?php
namespace VirgilSecurity\Customizer\Fields;


use VirgilSecurity\Customizer\Src\BaseField;

abstract class ImageField extends BaseField
{
    protected $type = 'image';

    protected $sanitizeCallback = 'esc_url';

}
