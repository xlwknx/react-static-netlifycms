<?php
namespace VirgilSecurity\Customizer\Fields;


use VirgilSecurity\Customizer\Src\ChoicesField;

class CodeField extends ChoicesField
{
    protected $type = 'kirki-code';

    protected $choices = [
        'language' => 'htmlmixed',
        'theme'    => 'kirki-light',
    ];
}
