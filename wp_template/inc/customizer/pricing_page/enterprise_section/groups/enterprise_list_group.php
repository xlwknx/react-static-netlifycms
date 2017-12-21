<?php

namespace VirgilSecurity\Customizer\PricingPage\EnterpriseSection\Groups;


use VirgilSecurity\Customizer\Fields\TextField;

use VirgilSecurity\Customizer\Src\FieldsGroup;

class EnterpriseListGroup extends FieldsGroup
{
    protected $optional = true;


    public function __construct()
    {
        $this->setField(new TextField('title', __('Title')));

        $this->setRowLabel('title', __('item'));

        parent::__construct('pricing_page_enterprise_list', __('List'));
    }
}
