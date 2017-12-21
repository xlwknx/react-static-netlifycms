<?php

namespace VirgilSecurity\Customizer\Src;


abstract class BaseModification implements ModificationInterface
{
    protected $defaultValue;


    public function __construct($defaultValue = null)
    {
        $this->defaultValue = $defaultValue;
    }


    abstract function getName();


    /**
     * @return mixed
     */
    public function getValue()
    {
        return get_theme_mod($this->getName(), $this->defaultValue);
    }


    public function setValue($value)
    {
        set_theme_mod($this->getName(), $value);

        return $this;
    }


    public function getDefaultValue()
    {
        if ($this->defaultValue) {
            return $this->defaultValue;
        }

        $file_path_parts = [
            'customizer',
            'default_content',
        ];

        $file_path = implode(DIRECTORY_SEPARATOR, $file_path_parts);

        $file = get_theme_file_path($file_path . DIRECTORY_SEPARATOR . $this->getName() . '.php');

        if (file_exists($file)) {
            $defaultContent = include $file;

            return $defaultContent;
        }
    }


    public function isEnabled()
    {
        return get_theme_mod('is_enabled_' . $this->getName(), true);
    }
}
