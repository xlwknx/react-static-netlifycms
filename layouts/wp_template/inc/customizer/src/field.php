<?php
namespace VirgilSecurity\Customizer\Src;


use InvalidArgumentException;

use Kirki;

class Field implements FieldInterface
{
    protected $type;

    protected $priority = 10;

    protected $transport = 'postMessage';

    protected $sanitizeCallback = 'wp_kses_post';

    protected $partialRefresh = [];

    protected $default;

    protected $settings;

    protected $label;

    /** @var ModificationInterface */
    private $modification;


    public function __construct($settings = null, $label = null)
    {
        $this->settings = $settings;
        $this->label = $label;
    }


    public static function createWithMod(ModificationInterface $modification)
    {
        $field = new static();

        $field->setModification($modification);

        return $field;
    }


    public function registerField(SectionInterface $section)
    {
        if (!$this->getSettings()) {
            throw new InvalidArgumentException('Field must be bound to modification or specify the Settings value');
        }

        Kirki::add_field($section->getConfigName(), $this->getKirkiArguments($section));
    }


    public function getSettings()
    {
        if ($this->modification != null) {
            return $this->modification->getName();
        }

        return $this->settings;
    }


    public function getLabel()
    {
        return $this->label;
    }


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
        if ($this->modification != null) {
            return $this->modification->getValue();
        }

        return $this->default;
    }


    public function getPartialRefresh()
    {
        return $this->partialRefresh;
    }


    public function setModification(ModificationInterface $modification)
    {
        $this->modification = $modification;
    }


    public function getModification()
    {
        return $this->modification;
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
