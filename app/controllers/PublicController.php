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

    public function downloads()
    {

        $this->setActivePage('downloads');
        $this->layout->content = View::make(
            'pages.public.downloads'
        );
    }

    public function documents()
    {

        $this->setActivePage('documents');
        $this->layout->content = View::make(
            'pages.public.documents'
        );
    }

    public function signin()
    {

        $this->setActivePage('signin');
        $this->layout->content = View::make(
            'pages.public.signin'
        );
    }

    public function signup()
    {

        $this->setActivePage('signup');
        $this->layout->content = View::make(
            'pages.public.signup'
        );
    }

    public function reset()
    {

        $this->setActivePage('reset');
        $this->layout->content = View::make(
            'pages.public.reset'
        );
    }
}