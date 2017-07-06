<?php

namespace VirgilSecurity\Models\Base;


use VirgilSecurity\Customizer\FooterSection\Modifications\Sections\FooterSectionMods;

use VirgilSecurity\Models\Src\BaseSectionModel;

class FooterSectionModel extends BaseSectionModel
{
    const SHOW_SECTION_MOD = 'is_enabled_footer_section';

    /** @var FooterSectionMods */
    protected $sectionMods;


    public function __construct()
    {
        $this->sectionMods = new FooterSectionMods();
    }


    public function Logo()
    {
        $logoImageMod = $this->sectionMods->getLogoImageMod();

        if ($logoImageMod->isEnabled()) {
            $logoImageUrl = $logoImageMod->getValue();

            $logoImageId = attachment_url_to_postid($logoImageUrl);

            if ($logoImageId != 0) {
                $meta = wp_get_attachment($logoImageId);

                return new AttachmentModel(
                    $meta['src'], $meta['href'], $meta['alt'], $meta['title'], $meta['description'], $meta['caption']
                );
            } else {
                return new AttachmentModel($logoImageUrl, $logoImageUrl);
            }
        }
    }


    public function Description()
    {
        $logoDescription = $this->sectionMods->getLogoDescription();

        if ($logoDescription->isEnabled()) {
            return $logoDescription->getValue();
        }
    }


    public function SocialLinks()
    {
        $socialLinks = $this->sectionMods->getSocialLinksMod();

        if ($socialLinks->isEnabled()) {
            $values = (array)$socialLinks->getValue();

            return array_filter(
                $values,
                function ($value) {
                    return $value['is_hidden'] == false;
                }
            );
        }
    }
}
