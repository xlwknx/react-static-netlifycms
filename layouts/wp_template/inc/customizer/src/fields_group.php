<?php

namespace VirgilSecurity\Customizer\Src;


use InvalidArgumentException;

use Kirki;

class FieldsGroup implements FieldsGroupInterface
{
    protected $type = 'repeater';

    protected $default = [];

    protected $priority = 10;

    protected $transport = 'refresh';

    protected $fields = [];

    protected $rowLabel = [];

    protected $settings;

    protected $label;

    /** @var ModificationInterface */
    private $modification;


    public function __construct($settings = null, $label = null)
    {
        $this->settings = $settings;
        $this->label = $label;
    }


    public static function createWithMod(ModificationInterface $modification)
    {
        $field = new static();
        $field->setModification($modification);

        return $field;
    }


    public function getLabel()
    {
        return $this->label;
    }


    public function getSettings()
    {
        if ($this->modification != null) {
            return $this->modification->getName();
        }

        return $this->settings;
    }


    public function getType()
    {
        return $this->type;
    }


    public function getPriority()
    {
        return $this->priority;
    }


    public function getDefault()
    {
        if ($this->modification != null) {
            return $this->modification->getValue();
        }

        return $this->default;
    }


    public function registerField(SectionInterface $section)
    {
        if (!$this->getSettings()) {
            throw new InvalidArgumentException('Field must be bound to modification or specify the Settings value');
        }

        Kirki::add_field($section->getConfigName(), $this->getKirkiArguments($section));
    }


    public function setField(FieldInterface $field)
    {
        $this->fields[$field->getSettings()] = [
            'type'              => $field->getType(),
            'label'             => $field->getLabel(),
            'sanitize_callback' => $field->getSanitizeCallback(),
            'priority'          => $field->getPriority(),
        ];

        return $field->getSettings();
    }


    public function addRow(array $row)
    {
        $this->default[] = $row;
    }


    public function setRowLabel($fieldId, $addMoreButtonText)
    {
        $this->rowLabel = [
            'type'  => 'field',
            'value' => $addMoreButtonText,
            'field' => $fieldId,
        ];
    }


    public function setModification(ModificationInterface $modification)
    {
        $this->modification = $modification;
    }


    public function getModification()
    {
        return $this->modification;
    }


    protected function getKirkiArguments(SectionInterface $section)
    {
        return [
            'section'   => $section->getSection(),
            'type'      => $this->getType(),
            'settings'  => $this->getSettings(),
            'label'     => $this->getLabel(),
            'priority'  => $this->getPriority(),
            'default'   => $this->getDefault(),
            'row_label' => $this->getRowLabel(),
            'fields'    => $this->getFields(),
        ];
    }


    protected function getRowLabel()
    {
        return $this->rowLabel;
    }


    protected function getFields()
    {
        return $this->fields;
    }
}
