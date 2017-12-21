<?php

namespace VirgilSecurity\Customizer\Src;


interface FieldInterface extends RegisterFieldInterface
{
    public function getType();


    public function getPriority();


    public function getTransport();


    public function setTransport($transport);


    public function getSanitizeCallback();


    public function getDefault();


    public function setOptional($optional);


    public function setDefault($default);
}
