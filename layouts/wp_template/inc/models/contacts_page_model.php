<?php

namespace VirgilSecurity\Models;


use VirgilSecurity\Models\ContactsPage\PartnershipSectionModel;

use VirgilSecurity\Models\Src\LayoutModel;


class ContactsPageModel extends LayoutModel
{
    public function PartnershipSection()
    {
        return new PartnershipSectionModel();
    }
}
