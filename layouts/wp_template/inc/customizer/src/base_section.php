<?php

namespace VirgilSecurity\Customizer\Src;


use Kirki;

use VirgilSecurity\Customizer\Fields\SwitchField;

use WP_Customize_Manager;

use VirgilSecurity\Customizer\Fields\ToggleField;

abstract class BaseSection implements SectionInterface
{
    /** @var FieldInterface[] */
    protected $fields = [];

    protected $priority = 10;

    protected $active_callback = true;

    protected $optional = false;

    /** @var ConfigInterface */
    private $config;

    /** @var WP_Customize_Manager */
    private $wpCustomizer;


    public function __construct(ConfigInterface $config, WP_Customize_Manager $wpCustomizer)
    {
        $this->config = $config;
        $this->wpCustomizer = $wpCustomizer;
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
        $priority = count($this->fields) + 1;

        $field->setPriority($priority);

        if ($field->isOptional()) {

            $optionalSwitchField = new ToggleField(
                'is_enabled_' . $field->getSettings(), __('Show ' . $field->getLabel())
            );

            $optionalSwitchField->setPriority($priority + 1);
            $optionalSwitchField->setDefault(true);

            $this->fields[$optionalSwitchField->getSettings()] = $optionalSwitchField;
        }

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

        if ($this->isOptional()) {
            $optionalSwitchField = new SwitchField('is_enabled_' . $this->getSection(), __('Show section'));

            $optionalSwitchField->setPriority(count($this->fields) + 1);
            $optionalSwitchField->setDefault(true);
            $optionalSwitchField->setTransport(Transports::REFRESH);

            $this->fields[$optionalSwitchField->getSettings()] = $optionalSwitchField;
        }

        foreach ($this->fields as $field) {
            $field->registerField($this);
        }

        $partialRefresh = $this->getPartialRefresh();

        if (!empty($partialRefresh)) {
            $this->wpCustomizer->selective_refresh->add_partial(
                $this->getSection(),
                [
                    'selector'        => $partialRefresh['selector'],
                    'settings'        => array_keys($this->fields),
                    'render_callback' => $partialRefresh['render_callback'],
                ]
            );
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


    public function isOptional()
    {
        return $this->optional;
    }


    abstract public function getPartialRefresh();
}
