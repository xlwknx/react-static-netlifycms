<?php

namespace VirgilSecurity\Customizer\Src;


abstract class BaseSectionMods
{
    abstract public function setupDefaults();


    /** @var $modifications ModificationInterface[] */
    protected function setup($modifications)
    {
        foreach ($modifications as $modification) {
            set_theme_mod($modification->getName(), $modification->getDefaultValue());
        }
    }
}
