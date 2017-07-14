<?php
namespace VirgilSecurity\Customizer\Src;


interface ModificationInterface
{
    public function getName();


    public function getValue();


    public function setValue($value);


    public function getDefaultValue();


    public function getFilters();
}
