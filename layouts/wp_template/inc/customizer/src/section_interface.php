<?php

namespace VirgilSecurity\Customizer\Src;


interface SectionInterface
{
    public function addField(RegisterFieldInterface $field);


    public function getConfigName();


    public function registerSection($panel);


    public function getSection();


    public function getPartialRefresh();
}
