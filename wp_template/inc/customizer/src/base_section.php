<?php

namespace VirgilSecurity\Customizer\Src;


use Kirki;

use VirgilSecurity\Customizer\Fields\SwitchField;

use VirgilSecurity\Templates\Src\TemplateInterface;
use WP_Customize_Manager;

use VirgilSecurity\Customizer\Fields\ToggleField;
use WP_Query;

abstract class BaseSection implements SectionInterface
{
    /** @var FieldInterface[] */
    protected $fields = [];

    protected $priority = 10;

    protected $active_callback = true;

    protected $optional = false;

    protected $selector;

    /** @var ConfigInterface */
    protected $config;

    /** @var WP_Customize_Manager */
    protected $wpCustomizer;


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
                'is_enabled_' . $field->getSettings(), __('Show ' . strtolower($field->getLabel()))
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
                'active_callback' => function () {
                    global $wp_query;

                    return $this->getActiveCallback($wp_query);
                },
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

        if (!empty($partialRefresh) && $this->selector) {
            $this->wpCustomizer->selective_refresh->add_partial(
                $this->getSection(),
                [
                    'selector'            => $partialRefresh['selector'],
                    'settings'            => array_keys($this->fields),
                    'render_callback'     => $partialRefresh['render_callback'],
                    'container_inclusive' => $partialRefresh['container_inclusive'],
                ]
            );
        }
    }


    public function getActiveCallback(WP_Query $wp_query)
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


    /**
     * @return TemplateInterface
     */
    abstract public function getSectionTemplate();


    public function getPartialRefresh()
    {
        $template = $this->getSectionTemplate();

        return [
            'selector'            => $this->selector,
            'container_inclusive' => true,
            'render_callback'     => [$template, 'render'],
        ];
    }
}
