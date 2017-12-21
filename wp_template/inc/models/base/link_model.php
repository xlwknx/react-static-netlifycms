<?php

namespace VirgilSecurity\Models\Base;


use VirgilSecurity\Models\Src\BaseModel;

class LinkModel extends BaseModel
{
    /** @var string */
    private $href;

    /** @var string */
    private $text;


    /**
     * Class constructor.
     *
     * @param null $href
     * @param null $text
     */
    public function __construct($href = null, $text = null)
    {
        $this->href = $href;
        $this->text = $text;
    }


    /**
     * @return string
     */
    public function Href()
    {
        return $this->href;
    }


    /**
     * @return string
     */
    public function Text()
    {
        return $this->text;
    }
}
