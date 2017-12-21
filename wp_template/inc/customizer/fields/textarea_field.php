<?php

namespace VirgilSecurity\Customizer\Fields;


use VirgilSecurity\Customizer\Src\Field;

use VirgilSecurity\Customizer\Src\SectionInterface;

class TextareaField extends Field
{
    protected $type = 'textarea';

    protected $rows = 5;


    protected function getKirkiArguments(SectionInterface $section)
    {
        return array_merge(
            parent::getKirkiArguments($section),
            [
                'rows' => 10,
                'choices' => [
                    'element' => $this->getType(),
                    'rows'    => $this->getRows(),
                ],
            ]
        );

    }


    protected function getRows()
    {
        return $this->rows;
    }
}
