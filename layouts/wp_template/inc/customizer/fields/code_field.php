<?php
namespace VirgilSecurity\Customizer\Fields;


use VirgilSecurity\Customizer\Src\Field;
use VirgilSecurity\Customizer\Src\SectionInterface;

class CodeField extends Field
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
