<?php

namespace VirgilSecurity\Customizer\Src;


use WP_Query;

interface SectionInterface
{
    public function addField(RegisterFieldInterface $field);


    public function getFields();


    public function getConfigName();


    public function registerSection($panel = null);


    public function getSection();


    public function getPartialRefresh();


    public function getActiveCallback(WP_Query $wp_query);


    public function isOptional();


    public function getSectionTemplate();
}
