<?php

namespace VirgilSecurity\Customizer\ContactsPage\PartnershipSection\Fields;


use VirgilSecurity\Customizer\Fields\TextField;

class PartnershipHeadlineField extends TextField
{
    protected $optional = true;


    public function getLabel()
    {
        return __("Headline");
    }
}
