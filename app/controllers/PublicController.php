<?php


class PublicController extends AbstractController
{

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.public';

    public function aboutUs()
    {

        $this->setActivePage('about-us');
        $this->layout->content = View::make(
            'pages.public.about-us'
        );
    }

    public function contactUs()
    {

        $this->setActivePage('contact-us');
        $this->layout->content = View::make(
            'pages.public.contact-us'
        );
    }

    public function termsOfService()
    {

        $this->setActivePage('terms-of-service');
        $this->layout->content = View::make(
            'pages.public.terms-of-service'
        );
    }

    public function privacyPolicy()
    {

        $this->setActivePage('privacy-policy');
        $this->layout->content = View::make(
            'pages.public.privacy-policy'
        );
    }
}