<?php

namespace VirgilSecurity\Models\Base;


use VirgilSecurity\Models\Src\BaseModel;

class AttachmentModel extends BaseModel
{
    /**
     * @var null
     */
    private $src;
    /**
     * @var null
     */
    private $href;
    /**
     * @var null
     */
    private $alt;
    /**
     * @var null
     */
    private $title;
    /**
     * @var null
     */
    private $description;
    /**
     * @var null
     */
    private $caption;


    public function __construct(
        $src = null,
        $href = null,
        $alt = null,
        $title = null,
        $description = null,
        $caption = null
    ) {
        $this->src = $src;
        $this->href = $href;
        $this->alt = $alt;
        $this->title = $title;
        $this->description = $description;
        $this->caption = $caption;
    }


    public function Alt()
    {
        return $this->alt;
    }


    public function Src()
    {
        return $this->src;
    }


    public function Title()
    {
        return $this->title;
    }


    public function Href()
    {
        return $this->href;
    }


    public function Description()
    {
        return $this->description;
    }


    public function Caption()
    {
        return $this->description;
    }
}
