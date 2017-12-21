<?php
namespace VirgilSecurity\Customizer\Src;


class MultipleField extends ChoicesField
{
    protected $multiple = 0;


    public function getMultiple()
    {
        return $this->multiple;
    }


    protected function getKirkiArguments(SectionInterface $section)
    {
        return array_merge(
            parent::getKirkiArguments($section),
            [
                'multiple' => $this->getMultiple(),
            ]
        );
    }
}
