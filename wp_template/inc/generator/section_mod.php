<?php

namespace VirgilSecurity\Generator;


class SectionMod extends BaseGenerator
{
    /**
     * @var
     */
    private $modSettings;
    /**
     * @var
     */
    private $modName;


    public function __construct($modSettings, $modName)
    {
        $this->modSettings = $modSettings;
        $this->modName = $modName;
    }


    public function Generate($name, $description, $sectionMods = [], $page = null)
    {
        $modelName = $this->placeholderToName($name);
        $pageName = $this->placeholderToName($page);

        $settings = $this->modSettings;

        if ($page) {
            $settings = $page . '_' . $this->modSettings;
        }

        $path = $this->createPathToSectionMod($name, $page);

        $context = [
            'page_namespace'       => $pageName,
            'section_namespace'    => $modelName . 'Section',
            'section_mod_name'     => $this->modName,
            'section_mod_settings' => $settings,
        ];

        $this->renderToFile('section_mod.twig', $context, $path . $this->modSettings . '_mod.php');
    }
}
