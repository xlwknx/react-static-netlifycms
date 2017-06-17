<?php

namespace VirgilSecurity\Customizer\Src;


use Kirki;

abstract class BaseFieldsGroup implements FieldsGroupInterface
{
    protected $type = 'repeater';

    protected $default = [];

    protected $priority = 10;

    protected $transport = 'refresh';

    protected $fields = [];

    protected $rowLabel = [];


    abstract public function getSettings();


    abstract public function getLabel();


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
        $file_path_parts = [
            'customizer',
            'default_content',
        ];

        $file_path = implode(DIRECTORY_SEPARATOR, $file_path_parts);

        $file = get_theme_file_path($file_path . DIRECTORY_SEPARATOR . $this->getSettings() . '.php');

        if (file_exists($file)) {
            return include $file;
        }

        return $this->default;
    }


    public function registerField(SectionInterface $section)
    {
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
