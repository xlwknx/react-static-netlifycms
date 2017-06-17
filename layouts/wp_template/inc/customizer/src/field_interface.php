<?php
namespace VirgilSecurity\Customizer\Src;


interface FieldInterface extends RegisterFieldInterface
{
    public function getLabel();


    public function getType();


    public function getPriority();


    public function getTransport();


    public function getSanitizeCallback();


    public function getDefault();


    public function getPartialRefresh();
}
