<?php

namespace VirgilSecurity\Models;


use VirgilSecurity\Models\ContactsPage\ContactUsSectionModel;
use VirgilSecurity\Models\ContactsPage\MapSectionModel;
use VirgilSecurity\Models\ContactsPage\PartnershipSectionModel;

use VirgilSecurity\Models\Src\LayoutModel;


class ContactsPageModel extends LayoutModel
{
    public function PartnershipSection()
    {
        return new PartnershipSectionModel();
    }


    public function ContactUsSection()
    {
        return new ContactUsSectionModel();
    }


    public function MapSection()
    {
        return new MapSectionModel();
    }
}
