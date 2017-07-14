<?php

namespace VirgilSecurity\Customizer\Src;


use Kirki;

abstract class BaseSection implements SectionInterface
{
    /** @var FieldInterface[] */
    protected $fields = [];

    protected $priority = 10;

    protected $active_callback = true;

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
                'title'           => $this->getTitle(),
                'description'     => $this->getDescription(),
                'priority'        => $this->getPriority(),
                'panel'           => $panel,
                'active_callback' => [$this, 'getActiveCallback'],
            ]
        );

        foreach ($this->fields as $field) {
            $field->registerField($this);
        }
    }


    public function getActiveCallback()
    {
        return $this->active_callback;
    }


    public function getFields()
    {
        return $this->fields;
    }
}
