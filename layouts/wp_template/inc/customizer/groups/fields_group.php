<?php
namespace VirgilSecurity\Customizer\Groups;


use VirgilSecurity\Customizer\Src\BaseFieldsGroup;

class FieldsGroup extends BaseFieldsGroup
{
    private $settings;

    private $label;


    public function __construct($settings, $label)
    {
        $this->settings = $settings;
        $this->label = $label;
    }


    public function getSettings()
    {
        return $this->settings;
    }


    public function getLabel()
    {
        return $this->label;
    }
}
