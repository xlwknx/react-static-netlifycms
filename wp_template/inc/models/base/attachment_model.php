<?php

namespace VirgilSecurity\Models\Base;


use VirgilSecurity\Models\Src\BaseModel;

class AttachmentModel extends BaseModel
{
    /** @var string */
    private $src;

    /** @var string */
    private $href;

    /** @var string */
    private $alt;

    /** @var string */
    private $title;

    /** @var string */
    private $description;

    /** @var string */
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


    public static function createFromImageUrl($imageUrl)
    {
        $logoImageId = attachment_url_to_postid($imageUrl);

        if ($logoImageId != 0) {
            $meta = virgilsecurity_wp_get_attachment($logoImageId);

            return new AttachmentModel(
                $meta['src'], $meta['href'], $meta['alt'], $meta['title'], $meta['description'], $meta['caption']
            );
        } else {
            return new AttachmentModel($imageUrl, $imageUrl);
        }
    }


    public static function createFromImageId($imageId)
    {
        if ($imageId != 0) {
            $meta = virgilsecurity_wp_get_attachment($imageId);

            return new AttachmentModel(
                $meta['src'], $meta['href'], $meta['alt'], $meta['title'], $meta['description'], $meta['caption']
            );
        } else {
            return new AttachmentModel();
        }
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
