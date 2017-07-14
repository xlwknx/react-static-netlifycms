<?php

namespace VirgilSecurity\Templates\Src;


use Timber\Timber;

abstract class Template implements TemplateInterface
{
    const ENTRY_KEY = 'models';


    /**
     * @inheritdoc
     */
    public function render($output = true)
    {
        ob_start();

        Timber::render($this->getTemplatePath(), $this->getContext());

        $content = ob_get_contents();

        ob_end_clean();

        if (!$output) {
            return $content;
        }

        echo $content;
    }


    /**
     * @inheritdoc
     */
    public function getContext()
    {
        $context = Timber::get_context();

        $context[static::ENTRY_KEY] = $this->getModel();

        return $context;
    }


    /**
     * @inheritdoc
     */
    abstract public function getTemplatePath();


    /**
     * @inheritdoc
     */
    abstract public function getModel();
}

