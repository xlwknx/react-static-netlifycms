<?php
namespace VirgilSecurity\Customizer\Fields;


use VirgilSecurity\Customizer\Src\BaseField;

class TextField extends BaseField
{
    protected $type = 'text';

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
