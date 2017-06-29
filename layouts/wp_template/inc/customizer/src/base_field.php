<?php

namespace VirgilSecurity\Customizer\Src;


use InvalidArgumentException;

use Kirki;

abstract class BaseField
{
    protected $type;

    protected $priority = 10;

    protected $transport = Transports::REFRESH;

    protected $default;

    protected $settings;

    protected $label;

    protected $optional = false;

    /** @var ModificationInterface */
    protected $modification;


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


    public function isOptional()
    {
        return $this->optional;
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


    public function setPriority($priority)
    {
        $this->priority = $priority;
    }


    public function getTransport()
    {
        return $this->transport;
    }


    public function setTransport($transport)
    {
        $this->transport = $transport;
    }


    public function getDefault()
    {
        if ($this->modification != null) {
            return $this->modification->getValue();
        }

        return $this->default;
    }


    public function setModification(ModificationInterface $modification)
    {
        $this->modification = $modification;
    }


    public function getModification()
    {
        return $this->modification;
    }


    public function setLabel($label)
    {
        $this->label = $label;
    }


    public function setOptional($optional)
    {
        $this->optional = $optional;
    }


    public function setDefault($default)
    {
        if ($this->modification != null) {
            $this->modification->setValue($default);
        } else {
            $this->default = $default;
        }
    }


    protected abstract function getKirkiArguments(SectionInterface $section);
}
