<?php
namespace VirgilSecurity\Customizer\Src;


class ChoicesField extends Field
{
    protected $choices = [];


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
