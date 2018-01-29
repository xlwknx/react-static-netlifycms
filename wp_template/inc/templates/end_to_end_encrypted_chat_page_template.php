<?php

namespace VirgilSecurity\Templates;


use VirgilSecurity\Models\EndToEndEncryptedChatPageModel;
use VirgilSecurity\Templates\Src\Template;

class EndToEndEncryptedChatPageTemplate extends Template
{
    /**
     * @inheritdoc
     */
    public function getTemplatePath()
    {
        return 'end_to_end_encrypted_chat-page.twig';
    }


    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return new EndToEndEncryptedChatPageModel();
    }
}
