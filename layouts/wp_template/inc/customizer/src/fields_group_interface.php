<?php

namespace VirgilSecurity\Customizer\Src;


interface FieldsGroupInterface extends FieldInterface
{
    public function setField(FieldInterface $field);


    public function setRowLabel($fieldId, $addMoreButtonText);


    public function addRow(array $row);


    public function setOptional($optional);


    public function setDefault($default);


    public function getDefault();


    public function getChoices();
}
