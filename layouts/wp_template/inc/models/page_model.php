<?php

namespace VirgilSecurity\Models;


use VirgilSecurity\Models\Page\ArticleSectionModel;
use VirgilSecurity\Models\Page\IntroSectionModel;

use VirgilSecurity\Models\Src\LayoutModel;

class PageModel extends LayoutModel
{
    /** @var IntroSectionModel */
    protected $introSectionModel;

    /** @var ArticleSectionModel */
    protected $articleSectionModel;


    /**
     * Class constructor.
     *
     * @param       $title
     * @param       $content
     * @param array $navigationList
     */
    public function __construct($title, $content, $navigationList = [])
    {
        $this->introSectionModel = new IntroSectionModel($title, $navigationList);
        $this->articleSectionModel = new ArticleSectionModel($content);
    }


    public function IntroSection()
    {
        return $this->introSectionModel;
    }


    public function ArticleSection()
    {
        return $this->articleSectionModel;
    }
}
