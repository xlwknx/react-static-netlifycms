<?php
namespace VirgilSecurity\Customizer\Src;


use Kirki;

abstract class BaseField implements FieldInterface
{
    protected $type;

    protected $default;

    protected $priority = 10;

    protected $transport = 'postMessage';

    protected $sanitizeCallback = 'wp_kses_post';

    protected $partialRefresh = [];


    public function registerField(SectionInterface $section)
    {
        Kirki::add_field($section->getConfigName(), $this->getKirkiArguments($section));
    }


    abstract public function getSettings();


    abstract public function getLabel();


    public function getType()
    {
        return $this->type;
    }


    public function getPriority()
    {
        return $this->priority;
    }


    public function getTransport()
    {
        return $this->transport;
    }


    public function getSanitizeCallback()
    {
        return $this->sanitizeCallback;
    }


    public function getDefault()
    {
        $file_path_parts = [
            'customizer',
            'default_content',
        ];

        $file_path = implode(DIRECTORY_SEPARATOR, $file_path_parts);

        $file = get_theme_file_path($file_path . DIRECTORY_SEPARATOR . $this->getSettings() . '.php');

        if (file_exists($file)) {
            return include $file;
        }

        return $this->default;
    }


    public function getPartialRefresh()
    {
        return $this->partialRefresh;
    }


    protected function getKirkiArguments(SectionInterface $section)
    {
        $partialRefresh = $this->getPartialRefresh();

        if (empty($partialRefresh)) {
            $partialRefresh = $section->getPartialRefresh();
        }

        return [
            'section'           => $section->getSection(),
            'type'              => $this->getType(),
            'settings'          => $this->getSettings(),
            'label'             => $this->getLabel(),
            'priority'          => $this->getPriority(),
            'transport'         => $this->getTransport(),
            'sanitize_callback' => $this->getSanitizeCallback(),
            'default'           => $this->getDefault(),
            'partial_refresh'   => $partialRefresh,
        ];
    }
}
