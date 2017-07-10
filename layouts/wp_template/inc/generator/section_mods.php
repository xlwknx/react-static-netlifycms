<?php

namespace VirgilSecurity\Generator;


class SectionMods extends BaseGenerator
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

        $sectionModsItems = [];

        foreach ($sectionMods as $sectionMod) {
            $key = $name . '_' . $sectionMod . '_mod';
            $sectionModsItems[$name . '_' . $sectionMod] = $this->placeholderToName($key);
        }

        $context = [
            'page_namespace'    => $pageName,
            'section_namespace' => $modelName . 'Section',
            'section_mods_name' => $modelName . 'SectionMods',
            'section_mods'      => $sectionModsItems,
        ];

        $path = $this->createPathToSectionMods($name, $page);

        $this->renderToFile('section_mods.twig', $context, $path . $name . '_section_mods.php');

        foreach ($sectionModsItems as $sectionModsKey => $sectionModsItem) {
            $sectionMod = new SectionMod($sectionModsKey, $sectionModsItem);
            $sectionMod->Generate($name, $description, $sectionMods, $page);
        }
    }
}
