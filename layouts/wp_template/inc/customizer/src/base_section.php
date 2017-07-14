<?php

namespace VirgilSecurity\Customizer\Src;


use Kirki;

abstract class BaseSection implements SectionInterface
{
    /** @var \VirgilSecurity\Customizer\Src\FieldInterface[] */
    protected $fields = [];

    protected $priority = 10;

    /** @var ConfigInterface */
    private $config;


    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
    }


    public abstract function getSection();


    public abstract function getTitle();


    public abstract function getDescription();


    public function getConfigName()
    {
        return $this->config->getName();
    }


    public function getPriority()
    {
        return $this->priority;
    }


    public function addField(RegisterFieldInterface $field)
    {
        $this->fields[$field->getSettings()] = $field;
    }


    public function registerSection($panel = null)
    {
        Kirki::add_section(
            $this->getSection(),
            [
                'title'       => $this->getTitle(),
                'description' => $this->getDescription(),
                'priority'    => $this->getPriority(),
                'panel'       => $panel,
            ]
        );

        foreach ($this->fields as $field) {
            $field->registerField($this);
        }
    }
}
