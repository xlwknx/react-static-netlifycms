<?php

namespace VirgilSecurity\Templates\Src;


interface TemplateInterface
{
    /**
     * Render given template.
     *
     * @param bool $output
     *
     * @return string|void
     */
    public function render($output = true);


    /**
     * @return array
     */
    public function getContext();


    /**
     * @return string
     */
    public function getTemplatePath();


    /**
     * @return mixed
     */
    public function getModel();
}
