<?php

namespace VirgilSecurity\Customizer\Src;


class Field extends BaseField implements FieldInterface
{
    protected $sanitizeCallback = 'wp_kses_post';


    protected $transport = Transports::POST_MESSAGE;


    public function getSanitizeCallback()
    {
        return $this->sanitizeCallback;
    }


    protected function getKirkiArguments(SectionInterface $section)
    {
        return [
            'section'           => $section->getSection(),
            'type'              => $this->getType(),
            'settings'          => $this->getSettings(),
            'label'             => $this->getLabel(),
            'priority'          => $this->getPriority(),
            'transport'         => $this->getTransport(),
            'sanitize_callback' => $this->getSanitizeCallback(),
            'default'           => $this->getDefault(),
        ];
    }
}
