<?php

namespace VirgilSecurity\Customizer\PricingPage\IntroSection\Groups;


use VirgilSecurity\Customizer\Fields\ButtonSkinSelectField;
use VirgilSecurity\Customizer\Fields\CheckboxField;
use VirgilSecurity\Customizer\Fields\LinkField;
use VirgilSecurity\Customizer\Fields\Repeater\NumberField;
use VirgilSecurity\Customizer\Fields\TextareaField;
use VirgilSecurity\Customizer\Fields\TextField;

use VirgilSecurity\Customizer\PricingPage\IntroSection\Fields\IntroPlanDurationListField;

use VirgilSecurity\Customizer\Src\FieldsGroup;

class IntroPlansListGroup extends FieldsGroup
{
    protected $optional = true;

    protected $limit = 3;


    public function __construct()
    {
        $this->setField(new TextField('title', __('Title')));

        $this->setField(new CheckboxField('is_free', __('Is a free plan?')));

        $this->setField(new NumberField('price', __('Price')));
        $this->setField(new IntroPlanDurationListField('duration', __('Per duration')));

        $this->setField(new TextareaField('features_list', __('Features list (separated by empty line)')));
        $this->setField(new TextareaField('features_list_disabled', __('Features list, disabled (separated by empty line)')));

        $this->setField(new TextField('link_text', __('Link text')));
        $this->setField(new LinkField('link_url', __('Link url')));
        $this->setField(new ButtonSkinSelectField('link_skin', __('Link skin')));
        $this->setField(new CheckboxField('is_link_disabled', __('Is link disabled?')));

        $this->setRowLabel('title', __('plan'));

        parent::__construct('pricing_page_intro_plans_list', __('Plans list'));
    }
}
