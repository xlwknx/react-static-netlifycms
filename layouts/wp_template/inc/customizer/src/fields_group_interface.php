<?php
namespace VirgilSecurity\Customizer\Src;


interface FieldsGroupInterface extends RegisterFieldInterface
{
    public function setField(FieldInterface $field);

    public function setRowLabel($fieldId, $addMoreButtonText);

    public function addRow(array $row);
}
