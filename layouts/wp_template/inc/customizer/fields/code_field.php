<?php
namespace VirgilSecurity\Customizer\Fields;


use VirgilSecurity\Customizer\Src\BaseField;
use VirgilSecurity\Customizer\Src\SectionInterface;

abstract class CodeField extends BaseField
{
    protected $type = 'kirki-code';

    protected $choices = [
        'language' => 'htmlmixed',
        'theme'    => 'kirki-light',
    ];


    public function getChoices()
    {
        return $this->choices;
    }


    protected function getKirkiArguments(SectionInterface $section)
    {
        return array_merge(
            parent::getKirkiArguments($section),
            [
                'choices' => $this->getChoices(),
            ]
        );
    }
}
