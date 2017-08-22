<?php

namespace VirgilSecurity\Customizer\FeaturesPage\ConclusionSection\Groups;


use VirgilSecurity\Customizer\Groups\LinksGroup;

class ConclusionLinksGroup extends LinksGroup
{
    protected $optional = true;


    public function __construct()
    {
        $this->setRowLabel('link_text', __('conclusion link'));

        parent::__construct('features_page_conclusion_links', __('Conclusion links'));
    }
}
