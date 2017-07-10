<?php

namespace VirgilSecurity\Generator;


class Template extends BaseGenerator
{
    public function Generate($name, $description, $sectionMods = [], $page = null)
    {
        $templateName = $this->placeholderToName($name);
        $pageName = $this->placeholderToName($page);

        $templatePath = '';

        if ($page) {
            $templatePath .= $page . '/';
        }

        $templatePath .= $name . '_section.twig';

        $context = [
            'page_namespace'     => $pageName,
            'section_name_model' => $templateName . 'SectionModel',
            'template_name'      => $templateName . 'SectionTemplate',
            'template_key'       => $name,
            'template_path'      => $templatePath,
        ];

        $path = $this->createPathToTemplates($name, $page);

        $this->renderToFile('template.twig', $context, $path . $name . '_section_template.php');

    }
}
