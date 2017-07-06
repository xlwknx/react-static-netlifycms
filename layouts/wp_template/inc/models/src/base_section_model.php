<?php

namespace VirgilSecurity\Models\Src;


abstract class BaseSectionModel extends BaseModel
{
    const SHOW_SECTION_MOD = '';

    public function IsShow()
    {
        return get_theme_mod(static::SHOW_SECTION_MOD, true);
    }
}
