<?php
namespace VirgilSecurity\Customizer\Fields;


use VirgilSecurity\Customizer\Src\BaseField;

class LinkField extends BaseField
{
    protected $type = 'text';

    protected $sanitizeCallback = 'esc_url';

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
