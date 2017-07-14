<?php

namespace VirgilSecurity\Generator;


use Twig_Environment;
use Twig_Loader_Filesystem;

class BaseGenerator
{
    public function renderToFile($template, $context, $filePath)
    {
        $loader = new Twig_Loader_Filesystem('inc/generator/_templates');
        $twig = new Twig_Environment($loader);


        $content = $twig->render($template, $context);

        file_put_contents($filePath, $content);
    }


    protected function placeholderToName($placeholder)
    {
        $nameParts = array_map(
            function ($part) {
                return ucfirst($part);
            },
            explode('_', $placeholder)
        );

        $sectionClassName = implode('', $nameParts);

        return $sectionClassName;
    }


    protected function createPathToSection($section, $page = null)
    {
        $path = __DIR__ . '/../customizer/';

        if ($page) {
            $path .= $page . '/';
        }

        if ($section) {
            $path .= $section . '_section/';
        }

        mkdir($path, 0777, true);

        return $path;
    }


    protected function createPathToTemplates($template, $page = null)
    {
        $path = __DIR__ . '/../templates/';

        if ($page) {
            $path .= $page . '/';
        }

        mkdir($path, 0777, true);

        return $path;
    }


    protected function createPathToModels($template, $page = null)
    {
        $path = __DIR__ . '/../models/';

        if ($page) {
            $path .= $page . '/';
        }

        mkdir($path, 0777, true);

        return $path;
    }


    protected function createPathToSectionMods($section, $page = null)
    {
        $path = __DIR__ . '/../customizer/';

        if ($page) {
            $path .= $page . '/';
        }

        if ($section) {
            $path .= $section . '_section/';
        }

        $path .= 'modifications/sections/';

        mkdir($path, 0777, true);

        return $path;
    }

    protected function createPathToSectionMod($section, $page = null)
    {
        $path = __DIR__ . '/../customizer/';

        if ($page) {
            $path .= $page . '/';
        }

        if ($section) {
            $path .= $section . '_section/';
        }

        $path .= 'modifications/';

        mkdir($path, 0777, true);

        return $path;
    }
}
