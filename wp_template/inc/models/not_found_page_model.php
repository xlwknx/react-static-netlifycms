<?php

namespace VirgilSecurity\Models;


use VirgilSecurity\Models\Src\LayoutModel;

class NotFoundPageModel extends LayoutModel
{
    /**
     * @var
     */
    private $caption;
    /**
     * @var
     */
    private $headline;
    /**
     * @var
     */
    private $text;
    /**
     * @var array
     */
    private $links;


    public function __construct($caption, $headline, $text, $links = [])
    {
        $this->caption = $caption;
        $this->headline = $headline;
        $this->text = $text;
        $this->links = $links;
    }


    public function Caption()
    {
        return $this->caption;
    }


    public function Headline()
    {
        return $this->headline;
    }


    public function Text()
    {
        return $this->text;
    }


    public function Links()
    {
        return $this->links;
    }

}
