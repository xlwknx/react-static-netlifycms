<?php

namespace VirgilSecurity\Models\Page;


use VirgilSecurity\Models\Src\BaseModel;

class ArticleSectionModel extends BaseModel
{
    /** @var string */
    protected $content;


    /**
     * Class constructor.
     *
     * @param       $content
     */
    public function __construct($content)
    {

        $this->content = $content;
    }


    public function Content()
    {
        return $this->content;
    }
}
