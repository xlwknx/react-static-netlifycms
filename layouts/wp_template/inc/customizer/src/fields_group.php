<?php

namespace VirgilSecurity\Customizer\Src;


use VirgilSecurity\Customizer\Fields\CheckboxField;

use VirgilSecurity\Customizer\Fields\SelectField;

class FieldsGroup extends BaseField implements FieldsGroupInterface
{
    protected $type = 'repeater';

    protected $default = [];

    protected $fields = [];

    protected $rowLabel = [];

    protected $limit = false;


    public function __construct($settings = null, $label = null)
    {
        if ($this->isOptional()) {
            $optionalSwitchField = new CheckboxField('is_hidden', __('Hidden'));
            $optionalSwitchField->setPriority(0);

            $this->setField($optionalSwitchField);
        }

        parent::__construct($settings, $label);
    }


    public function setField(FieldInterface $field)
    {
        $this->fields[$field->getSettings()] = $this->getFieldSettings($field);

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


    public function getChoices()
    {
        if ($this->limit) {
            return [
                'limit' => $this->limit,
            ];
        }

        return [];
    }


    protected function getKirkiArguments(SectionInterface $section)
    {
        return [
            'section'           => $section->getSection(),
            'type'              => $this->getType(),
            'settings'          => $this->getSettings(),
            'label'             => $this->getLabel(),
            'priority'          => $this->getPriority(),
            'default'           => $this->getDefault(),
            'row_label'         => $this->getRowLabel(),
            'fields'            => $this->getOrderedFields(),
            'sanitize_callback' => $this->getSanitizeCallback(),
            'choices'           => $this->getChoices(),
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


    private function getFieldSettings(FieldInterface $field)
    {
        $fieldSettings = [
            'type'              => $field->getType(),
            'label'             => $field->getLabel(),
            'sanitize_callback' => $field->getSanitizeCallback(),
            'priority'          => $field->getPriority(),
        ];

        switch ($field->getType()) {
            case 'select':
                /** @var $field SelectField */
                $fieldSettings['choices'] = $field->getChoices();
        }

        return $fieldSettings;
    }


    private function getOrderedFields()
    {
        $fields = [];

        foreach ($this->fields as $fieldName => $field) {
            $fields[$field['priority']][$fieldName] = $field;
        }

        ksort($fields);

        $sortedFields = [];

        foreach ($fields as $sortedField) {
            $sortedFields += $sortedField;
        }

        return $sortedFields;
    }
}
