<?php

namespace VirgilSecurity\Generator;


class Section extends BaseGenerator
{

    public function Generate($name, $description, $sectionMods = [], $sectionPage = null)
    {
        $this->generateSection($name, $description, $sectionMods, $sectionPage);
        $this->generateTemplate($name, $description, $sectionMods, $sectionPage);
        $this->generateModel($name, $description, $sectionMods, $sectionPage);
        $this->generateSectionMods($name, $description, $sectionMods, $sectionPage);
    }


    protected function generateSection($name, $description, $sectionMods = [], $sectionPage = null)
    {
        $sectionClassName = $this->placeholderToName($name);
        $sectionPageName = $this->placeholderToName($sectionPage);


        $context = [
            'section_name'          => $sectionClassName . 'Section',
            'section_description'   => $description,
            'base_section_name'     => $sectionPageName . 'Section',
            'page_namespace'        => $sectionPageName,
            'section_name_template' => $sectionClassName . 'SectionTemplate',
            'section_optional'      => true,
            'section_priority'      => '25',
            'section_selector'      => '.page .' . lcfirst($sectionClassName),
            'section_title'         => trim(preg_replace('/[A-Z]/', ' $0', $sectionClassName) . ' Section'),
            'section_mod'           => $sectionPage . '_' . $name . '_section',
        ];

        $path = $this->createPathToSection($name, $sectionPage);

        $this->renderToFile('section.twig', $context, $path . $name . '_section.php');
    }


    protected function generateTemplate($name, $description, $sectionMods = [], $sectionPage = null)
    {
        $template = new Template();

        $template->Generate($name, $description, $sectionMods, $sectionPage);
    }


    protected function generateModel($name, $description, $sectionMods = [], $sectionPage = null)
    {
        $model = new Model();

        $model->Generate($name, $description, $sectionMods, $sectionPage);
    }


    protected function generateSectionMods($name, $description, $sectionMods = [], $sectionPage = null)
    {
        $sectionMod = new SectionMods();

        $sectionMod->Generate($name, $description, $sectionMods, $sectionPage);
    }
}
