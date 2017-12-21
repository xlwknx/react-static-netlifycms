<?php

namespace VirgilSecurity\Customizer\FeaturesPage\FaqSection\Groups;


use VirgilSecurity\Customizer\Fields\TextareaField;

use VirgilSecurity\Customizer\Src\FieldsGroup;

class FaqQuestionsListGroup extends FieldsGroup
{
    protected $optional = true;


    public function __construct()
    {
        $this->setField(new TextareaField('question', __('Question')));
        $this->setField(new TextareaField('answer', __('Answer')));

        $this->setRowLabel('title', __('item'));

        parent::__construct('features_page_faq_questions_list', __('Questions list'));
    }
}
