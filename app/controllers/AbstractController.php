<?php

class AbstractController extends Controller {

    public function setActivePage($page) {

        View::share(
            'page',
            $page
        );
    }

    protected function setupLayout(){

        if(!is_null($this->layout)) {
            $this->layout = View::make(
                $this->layout
            );
        }

        View::share(
            'authToken',
            Cookie::get('auth_token')
        );
    }
} 