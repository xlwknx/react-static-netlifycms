<?php

namespace VirgilSecurity\Generator;


class Model extends BaseGenerator
{

    public function Generate($name, $description, $sectionMods = [], $page = null)
    {
        $modelName = $this->placeholderToName($name);
        $pageName = $this->placeholderToName($page);

        $templatePath = '';

        if ($page) {
            $templatePath .= $page . '/';
        }

        $templatePath .= $name . '_model.twig';

        $context = [
            'page_namespace'     => $pageName,
            'section_namespace'  => $modelName . 'Section',
            'section_mods_name'  => $modelName . 'SectionMods',
            'section_model_name' => $modelName . 'SectionModel',
            'show_section_mod'   => 'is_enabled_' . $name . '_section',
        ];

        $path = $this->createPathToModels($name, $page);

        $this->renderToFile('model.twig', $context, $path . $name . '_section_model.php');
    }
}
