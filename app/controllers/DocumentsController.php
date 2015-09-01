<?php


class DocumentsController extends AbstractController
{

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.public';

    public function index()
    {

        $this->setActivePage('documents');
        $this->layout->content = View::make(
            'pages.public.documents.index'
        );
    }

    public function reference($language, $reference) {

        $this->setActivePage('documents');
        $view = strtolower(
            sprintf(
                'pages.public.documents.%s.%s',
                $language,
                $reference
            )
        );

        if (View::exists($view))
        {
            View::share(
                'reference',
                $reference
            );
            $this->layout->content = View::make(
                $view
            );
        } else {
            return Redirect::to('/documents');
        }
    }

}



