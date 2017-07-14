<?php
namespace VirgilSecurity\Customizer\Src;


abstract class BaseModification implements ModificationInterface
{
    private $defaultValue;


    public function __construct($defaultValue = null)
    {
        $this->defaultValue = $defaultValue;

        foreach ($this->getFilters() as $filter) {
            add_filter('theme_mod_' . $this->getName(), $filter);
        }
    }


    abstract function getName();


    public function getValue()
    {
        return get_theme_mod($this->getName());
    }


    public function setValue($value)
    {
        set_theme_mod($this->getName(), $value);

        return $this;
    }


    public function getFilters()
    {
        if (!is_customize_preview()) {
            return ['virgilsecurity_do_shortcode'];
        }

        return [];
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
}
