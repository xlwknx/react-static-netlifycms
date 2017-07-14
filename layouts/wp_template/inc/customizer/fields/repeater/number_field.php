<?php

namespace VirgilSecurity\Customizer\Fields\Repeater;


use VirgilSecurity\Customizer\Src\Field;

class NumberField extends Field
{
    protected $type = 'text';

    protected $sanitizeCallback = ['Kirki_Sanitize_Values', 'number'];
}
