<?php
namespace VirgilSecurity\Customizer\Src;


interface RegisterFieldInterface
{
    public function registerField(SectionInterface $section);


    public function getSettings();


    public function setModification(ModificationInterface $modification);


    public function getModification();
}
