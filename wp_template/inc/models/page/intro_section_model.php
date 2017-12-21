<?php

namespace VirgilSecurity\Models\Page;


use VirgilSecurity\Models\Src\BaseModel;

class IntroSectionModel extends BaseModel
{
    /** @var string */
    protected $title;

    /** @var array */
    protected $navigationList;


    /**
     * Class constructor.
     *
     * @param string $title
     * @param array  $navigationList
     */
    public function __construct($title, $navigationList = [])
    {
        $this->title = $title;
        $this->navigationList = $navigationList;
    }


    public function Title()
    {
        return $this->title;
    }


    public function Navigation()
    {
        return array_map(
            function ($item) {
                return [
                    'class' => strpos($item, virgilsecurity_get_slug()) ? "active" : '',
                    'link'  => $item,
                ];
            },
            $this->navigationList
        );
    }
}
