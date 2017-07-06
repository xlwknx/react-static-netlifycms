<?php

namespace VirgilSecurity\Customizer\Src;


interface SectionInterface
{
    public function addField(RegisterFieldInterface $field);


    public function getFields();


    public function getConfigName();


    public function registerSection($panel = null);


    public function getSection();


    public function getPartialRefresh();


    public function getActiveCallback();


    public function isOptional();


    public function getSectionTemplate();
}
