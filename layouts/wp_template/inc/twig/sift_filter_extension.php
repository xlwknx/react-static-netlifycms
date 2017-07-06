<?php

namespace VirgilSecurity\Twig;


use Twig_Extension;
use Twig_SimpleFilter;

class SiftFilterExtension extends Twig_Extension
{
    public function getFilters()
    {
        return array(
            new Twig_SimpleFilter('sift', array($this, 'collectionFilter')),
        );
    }

    public function collectionFilter($field)
    {
        //$price = number_format($number, $decimals, $decPoint, $thousandsSep);
        //$price = '$'.$price;
        //
        //return $price;
    }
}
