<?php

namespace VirgilSecurity\Customizer\Src;


interface RegisterFieldInterface
{
    public function registerField(SectionInterface $section);


    public function getSettings();


    public function setModification(ModificationInterface $modification);


    public function getModification();


    public function setPriority($priority);


    public function isOptional();


    public function getLabel();


    public function setLabel($label);
}
