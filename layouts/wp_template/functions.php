<?php
// TODO: rename all function with virgilsecurity prefix to aloid collision
use VirgilSecurity\SectionModifications;

require_once get_parent_theme_file_path('/inc/autoloader_register.php');

/**
 * TODO: upload all images from assets
 * TODO: update content from production to default theme modifications.
 */
if (!function_exists('virgilsecurity_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support post thumbnails.
     */
    function virgilsecurity_setup()
    {
        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
        */
        add_theme_support('title-tag');

        /**
         * Make theme available for translation.
         * Translations can be placed in the /languages/ directory.
         */
        load_theme_textdomain('virgilsecurity', get_template_directory() . '/languages');

        /**
         * Add default posts and comments RSS feed links to <head>.
         */
        add_theme_support('automatic-feed-links');

        /**
         * Enable support for post thumbnails and featured images.
         */
        add_theme_support('post-thumbnails');

        ///**
        // * Add support for two custom navigation menus.
        // */
        //register_nav_menus(
        //    [
        //        'primary'   => __('Primary Menu', 'virgilsecurity'),
        //        'secondary' => __('Secondary Menu', 'virgilsecurity'),
        //    ]
        //);

        /**
         * Enable support for the following post formats:
         * aside, gallery, quote, image, and video
         */
        add_theme_support('post-formats', ['aside', 'gallery', 'quote', 'image', 'video']);

        add_theme_support('customize-selective-refresh-widgets');

        add_theme_support('starter-content', []);


        add_shortcode('current_year', 'virgilsecurity_current_year');
        add_shortcode('github_starz_count', 'get_github_stars');

        add_shortcode('header_nav_open', 'virgilsecurity_header_nav_open');
        add_shortcode('header_nav_close', 'virgilsecurity_header_nav_close');

        add_shortcode('header_nav_item', 'virgilsecurity_header_nav_item');
        add_shortcode('header_nav_item_open', 'virgilsecurity_header_nav_item_open');
        add_shortcode('header_nav_item_close', 'virgilsecurity_header_nav_item_close');

        add_shortcode('footer_nav_open', 'virgilsecurity_footer_nav_open');
        add_shortcode('footer_nav_close', 'virgilsecurity_footer_nav_close');

        add_shortcode('footer_nav_block_open', 'virgilsecurity_footer_nav_block_open');
        add_shortcode('footer_nav_block_close', 'virgilsecurity_footer_nav_block_close');

        add_shortcode('footer_nav_item', 'virgilsecurity_footer_nav_item');


        add_action('wp_enqueue_scripts', 'virgilsecurity_enqueue_style');
        add_action('wp_enqueue_scripts', 'virgilsecurity_enqueue_script');
        add_action('widgets_init', 'virgilsecurity_widgets_init');


        add_filter('get_theme_starter_content', 'setup_starter_content', 10, 2);
        add_filter('widget_text', 'do_shortcode');
        add_filter('black_studio_tinymce_before_text', '__return_empty_string');
        add_filter('black_studio_tinymce_after_text', '__return_empty_string');


        remove_all_filters('wp_editor_widget_content');

        add_filter('wp_editor_widget_content', 'wptexturize');
        add_filter('wp_editor_widget_content', 'convert_smilies');
        add_filter('wp_editor_widget_content', 'convert_chars');
        //add_filter( 'wp_editor_widget_content', 'wpautop' );
        add_filter('wp_editor_widget_content', 'shortcode_unautop');
        add_filter('wp_editor_widget_content', 'do_shortcode', 11);

        add_filter(
            'wpcf7_form_elements',
            function ($content) {
                $content = preg_replace(
                    '/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i',
                    '\2',
                    $content
                );

                return $content;
            }
        );

        remove_filter('the_content', 'wpautop');

        //add_filter( 'black_studio_tinymce_hide_empty', '__return_true' );

        add_editor_style('editor-style.css');

        store_github_stars();

        $virgilsecurity_section_mods = SectionModifications::getInstance();

        if (!$virgilsecurity_section_mods->isInitialized()) {
            $virgilsecurity_section_mods->setupDefaults();
        }
    }

    function virgilsecurity_do_shortcode($value)
    {
        if (is_array($value)) {
            foreach ($value as $key => $child) {
                $value[$key] = virgilsecurity_do_shortcode($child);
            }
        } else {
            $value = do_shortcode($value);
        }

        return $value;
    }

    function get_static_page_class()
    {
        $staticPageClasses = [
            ''                            => 'homePage',
            'homepage'                    => 'homePage',
            'about-virgil'                => 'aboutPage',
            'contacts'                    => 'contactsPage',
            'features'                    => 'featuresPage',
            'pricing'                     => 'pricingPage',
            'terms-of-use-privacy-policy' => 'contentPage termsPage',
        ];

        return isset($staticPageClasses[get_slug()]) ? $staticPageClasses[get_slug()] : 'contentPage';
    }

    function get_header_dark_class()
    {
        if (get_slug() == "contacts") {
            return "header--dark";
        } else {
            return "";
        }
    }

    function get_slug()
    {
        global $post;

        return $post_slug = $post->post_name;
    }

    function get_assetic_file_path($file)
    {
        return get_template_directory() . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . $file;
    }

    function setup_starter_content($content, $config)
    {
        return [
            //'attachments' => [
            //    'featured-image-logo' => [
            //        'post_title' => 'Logo',
            //        'file'       => 'assets/logo.png',
            //    ],
            //],
            'options' => [
                'show_on_front' => 'page',
                'page_on_front' => '{{homepage}}',
            ],
            'widgets' => [
                'top-menu'      => get_starter_content("widgets", "header", "top_menu"),
                'footer-top'    => get_starter_content("widgets", "footer", "footer_top"),
                'footer-bottom' => get_starter_content("widgets", "footer", "footer_bottom"),


                'hp-intro-area-headline'      => get_starter_content("widgets", "hp", "intro_area_headline"),
                'hp-intro-area-links'         => get_starter_content("widgets", "hp", "intro_area_links"),
                'hp-intro-langs'              => get_starter_content("widgets", "hp", "intro_langs"),
                'hp-use-case-content'         => get_starter_content("widgets", "hp", "use_case_content"),
                'hp-use-cases-list'           => get_starter_content("widgets", "hp", "use_case_list"),
                'hp-client-content'           => get_starter_content("widgets", "hp", "client_content"),
                'hp-services-content-block'   => get_starter_content("widgets", "hp", "services_content"),
                'hp-usage-content-block'      => get_starter_content("widgets", "hp", "usage_content"),
                'hp-conclusion-content-block' => get_starter_content("widgets", "hp", "conclusion_content"),


                'pricing-intro-block'            => get_starter_content("widgets", "pricing", "intro_block"),
                'pricing-plans-list'             => get_starter_content("widgets", "pricing", "plans_list"),
                'pricing-plans-msg'              => get_starter_content("widgets", "pricing", "plans_msg"),
                'pricing-enterprise-offer-msg'   => get_starter_content("widgets", "pricing", "enterprise_offer_msg"),
                'pricing-enterprise-offer-list'  => get_starter_content("widgets", "pricing", "enterprise_offer_list"),
                'pricing-enterprise-offer-links' => get_starter_content("widgets", "pricing", "enterprise_offer_links"),
                'pricing-includes-list'          => get_starter_content("widgets", "pricing", "includes_list"),
                'pricing-includes-msg'           => get_starter_content("widgets", "pricing", "includes_msg"),
                'pricing-conclusion-msg'         => get_starter_content("widgets", "pricing", "conclusion_msg"),


                'contact-us-msg'               => get_starter_content("widgets", "contacts", "contact_us_msg"),
                'contact-us-block'             => get_starter_content("widgets", "contacts", "contact_us_block"),
                'contact-partnership-msg'      => get_starter_content("widgets", "contacts", "contact_partnership_msg"),
                'contact-partnership-contacts' => get_starter_content(
                    "widgets",
                    "contacts",
                    "contact_partnership_contacts"
                ),
                'contact-map-address'          => get_starter_content("widgets", "contacts", "contact_map_address"),


                'features-intro-msg'       => get_starter_content("widgets", "features", "features_intro_msg"),
                'features-intro-feature'   => get_starter_content("widgets", "features", "features_intro_feature"),
                'features-cryptogram-msg'  => get_starter_content("widgets", "features", "features_cryptogram_msg"),
                'features-cryptogram-list' => get_starter_content("widgets", "features", "features_cryptogram_list"),
                'features-components'      => get_starter_content("widgets", "features", "features_components"),
                'features-languages'       => get_starter_content("widgets", "features", "features_languages"),
                'features-faq'             => get_starter_content("widgets", "features", "features_faq"),

                'about-virgil-intro-msg'        => get_starter_content(
                    "widgets",
                    "about-virgil",
                    "about_virgil_intro_msg"
                ),
                'about-virgil-intro-list'       => get_starter_content(
                    "widgets",
                    "about-virgil",
                    "about_virgil_intro_list"
                ),
                'about-virgil-mission'          => get_starter_content(
                    "widgets",
                    "about-virgil",
                    "about_virgil_mission"
                ),
                'about-virgil-leadership'       => get_starter_content(
                    "widgets",
                    "about-virgil",
                    "about_virgil_leadership"
                ),
                'about-virgil-highlights-msg'   => get_starter_content(
                    "widgets",
                    "about-virgil",
                    "about_virgil_highlights_msg"
                ),
                'about-virgil-highlights-items' => get_starter_content(
                    "widgets",
                    "about-virgil",
                    "about_virgil_highlights_items"
                ),
                'about-virgil-awards'           => get_starter_content(
                    "widgets",
                    "about-virgil",
                    "about_virgil_awards"
                ),
                'about-virgil-investors'        => get_starter_content(
                    "widgets",
                    "about-virgil",
                    "about_virgil_investors"
                ),
            ],
            'posts'   => [
                'about_virgil' => [
                    'post_type'    => 'page',
                    'post_name'    => 'about-virgil',
                    'post_title'   => __('About Virgil', 'virgilsecurity'),
                    'post_content' => __return_empty_string(),
                ],
                'clients'      => [
                    'post_type'    => 'page',
                    'post_name'    => 'clients',
                    'post_title'   => __('Clients', 'virgilsecurity'),
                    'post_content' => __return_empty_string(),
                ],
                'features'     => [
                    'post_type'    => 'page',
                    'post_name'    => 'features',
                    'post_title'   => __('Features', 'virgilsecurity'),
                    'post_content' => __return_empty_string(),
                ],
                'pricing'      => [
                    'post_type'    => 'page',
                    'post_name'    => 'pricing',
                    'post_title'   => __('Pricing', 'virgilsecurity'),
                    'post_content' => __return_empty_string(),
                ],
                'contacts'     => [
                    'post_type'    => 'page',
                    'post_name'    => 'contacts',
                    'post_title'   => __('Contacts', 'virgilsecurity'),
                    'post_content' => __return_empty_string(),
                ],
                'homepage'     => [
                    'post_type'    => 'page',
                    'post_name'    => 'homepage',
                    'post_title'   => __('Homepage', 'virgilsecurity'),
                    'post_content' => __return_empty_string(),
                ],
            ],
            //'nav_menus' => [
            //    'primary' => [
            //        'name'  => __('Primary Menu', 'virgilsecurity'),
            //        'items' => [
            //            'developers'        => [
            //                'type'  => 'custom',
            //                'title' => __('Developers', 'virgilsecurity'),
            //            ],
            //            'company'           => [
            //                'type'  => 'custom',
            //                'title' => __('Company', 'virgilsecurity'),
            //            ],
            //            'about_virgil_link' => [
            //                'type'             => 'post_type',
            //                'object'           => 'page',
            //                'menu_item_parent' => '-2',
            //                'object_id'        => '{{about_virgil}}',
            //            ],
            //            'clients_link'      => [
            //                'type'             => 'post_type',
            //                'object'           => 'page',
            //                'menu_item_parent' => '-2',
            //                'object_id'        => '{{clients}}',
            //            ],
            //            'blog_link'         => [
            //                'menu_item_parent' => '-2',
            //                'title'            => __('Blog', 'virgilsecurity'),
            //                'url'              => 'https://foursquare.com/',
            //            ],
            //            'features_link'     => [
            //                'type'      => 'post_type',
            //                'object'    => 'page',
            //                'object_id' => '{{features}}',
            //            ],
            //            'pricing_link'      => [
            //                //'menu_item_parent' => '-2',
            //                'type'      => 'post_type',
            //                'object'    => 'page',
            //                'object_id' => '{{pricing}}',
            //            ],
            //            'contacts_link'     => [
            //                'type'      => 'post_type',
            //                'object'    => 'page',
            //                'object_id' => '{{contacts}}',
            //            ],
            //        ],
            //    ],
            //],
        ];
    }

    function virgilsecurity_footer_nav_open($atts = [])
    {
        return '<nav class="footerNav">';
    }

    function virgilsecurity_footer_nav_close($atts = [])
    {
        return '</nav>';
    }

    function virgilsecurity_footer_nav_block_open($atts = [])
    {
        $class = isset($atts['addclass']) ? $atts['addclass'] : '';
        $label = isset($atts['label']) ? $atts['label'] : '';

        return sprintf(
            '<div class="footerNavBlock %s"><div class="footerNavBlock-caption">%s</div><ul>',
            $class,
            $label
        );
    }

    function virgilsecurity_footer_nav_block_close($atts = [])
    {
        return '</ul></div>';
    }

    function virgilsecurity_footer_nav_item($atts = [])
    {
        $link = isset($atts['link']) ? $atts['link'] : '';
        $label = isset($atts['label']) ? $atts['label'] : '';
        $slug = isset($atts['slug']) ? $atts['slug'] : '';

        if ($link == '') {
            $link = get_permalink_by_slug($slug);
        }

        return sprintf('<li><a href="%s">%s</a></li>', $link, $label);
    }

    function get_permalink_by_slug($slug)
    {
        return get_permalink(get_page_by_path($slug));
    }

    function get_starter_content(...$path_args)
    {
        $file_path = '';
        $file_name = array_pop($path_args);

        foreach ($path_args as $arg) {
            $file_path .= trim($arg, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        }

        return include get_theme_file_path('starter_content' . DIRECTORY_SEPARATOR . $file_path . $file_name . '.php');
    }

    function virgilsecurity_header_nav_item_open($atts = [])
    {
        $availableLevels = ['first', 'second'];

        $level = isset($atts['level']) ? $atts['level'] : 'first';

        if (!in_array($level, $availableLevels)) {
            $level = 'first';
        }

        $nextLevel1 = 'first';
        $nextLevel2 = 'second';

        if ($level == 'second') {
            $nextLevel1 = 'third';
            $nextLevel2 = 'third';
        }

        $cssClass = isset($atts['class']) ? $atts['class'] : '';
        $type = isset($atts['type']) ? $atts['type'] : 'div';
        $label = isset($atts['label']) ? $atts['label'] : '';

        $itemType = 'itemLink';

        if ($type == 'caption') {
            $type = 'div';
            $itemType = 'caption';
        }

        return sprintf(
            '<li class="%sLevel-item %s"><%s class="%sLevel-%s">%s</%s><ul class="%sLevel-list">',
            $level,
            $cssClass,
            $type,
            $nextLevel1,
            $itemType,
            $label,
            $type,
            $nextLevel2
        );
    }

    function virgilsecurity_header_nav_item_close($atts = [])
    {
        return '</ul></li>';
    }

    function virgilsecurity_header_nav_item($atts = [])
    {
        $availableIcons = ['book', 'bookmark', 'shield', 'case', 'medium'];

        $icon = isset($atts['icon']) ? $atts['icon'] : '';

        if (!in_array($icon, $availableIcons)) {
            $icon = '';
        }

        $availableLevels = ['first', 'second', 'third'];

        $level = isset($atts['level']) ? $atts['level'] : 'first';

        if (!in_array($level, $availableLevels)) {
            $level = 'first';
        }

        $cssClass = isset($atts['class']) ? $atts['class'] : '';
        $link = isset($atts['link']) ? $atts['link'] : '';
        $slug = isset($atts['slug']) ? $atts['slug'] : '';
        $post_id = isset($atts['post_id']) ? $atts['post_id'] : '';
        $label = isset($atts['label']) ? $atts['label'] : '';

        if ($slug != '' && get_slug() == $slug || get_the_ID() == $post_id) {
            $cssClass .= ' active';
        }

        if ($link == '') {
            $link = get_permalink_by_slug($slug);
        }

        $aClass = '';

        if ($level != 'third') {
            $aClass = sprintf('%sLevel-itemLink', $level);
        }

        $content = $label;

        if ($icon != '') {
            $content = sprintf('<i class="icon icon-%s" aria-hidden="true"></i><span>%s</span>', $icon, $content);
        }


        return sprintf(
            '<li class="%sLevel-item %s"><a href="%s" class="%s">%s</a></li>',
            $level,
            $cssClass,
            $link,
            $aClass,
            $content
        );
    }

    function virgilsecurity_header_nav_open($atts)
    {

        return '<nav class="headerNav"><ul class="firstLevel-list">';
    }

    function virgilsecurity_header_nav_close($atts)
    {
        return '</ul></nav>';
    }

    function virgilsecurity_current_year($atts)
    {
        return date("Y");
    }

    function virgilsecurity_enqueue_style()
    {
        wp_enqueue_style('core', get_stylesheet_uri());
    }

    function virgilsecurity_enqueue_script()
    {
        wp_enqueue_script('core', get_theme_file_uri('main.bundle.js'), [], false, true);
    }

    function get_github_stars()
    {
        $input = file_get_contents(get_theme_file_path('storage/github.json'));

        $inputData = json_decode($input, true);

        if (array_key_exists('data', $inputData)) {

            return $inputData['data']['stargazers_count'];
        }

        return 0;
    }

    function wp_get_attachment($attachment_id)
    {

        $attachment = get_post($attachment_id);

        return [
            'alt'         => get_post_meta($attachment->ID, '_wp_attachment_image_alt', true),
            'caption'     => $attachment->post_excerpt,
            'description' => $attachment->post_content,
            'href'        => get_permalink($attachment->ID),
            'src'         => $attachment->guid,
            'title'       => $attachment->post_title,
        ];
    }

    function store_github_stars()
    {
        store_github_stars_to_file(get_theme_file_path('storage/github.json'));
    }

    function store_github_stars_to_file($pathToFile, $minutes = 60)
    {
        $updatedAt = 0;

        $input = file_get_contents($pathToFile);

        $inputData = json_decode($input, true);


        if (array_key_exists('updated_at', $inputData)) {
            $updatedAt = $inputData['updated_at'];
        }

        //update once of $minutes
        if ((time() - $updatedAt) < $minutes * 60) {
            return;
        }


        $output = ['updated_at' => time()];

        $ch = curl_init('https://api.github.com/repos/VirgilSecurity/virgil');

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            [
                'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.89 Safari/537.36',
                'Content-Type: application/json',
            ]
        );

        $result = curl_exec($ch);

        if ($result == false) {
            curl_close($ch);

            return;
        }

        if (curl_getinfo($ch, CURLINFO_HTTP_CODE) == 200) {
            $output['data'] = json_decode($result, true);

            file_put_contents($pathToFile, json_encode($output));
        }

        curl_close($ch);
    }

    function virgilsecurity_widgets_init()
    {

        //Header
        register_sidebar(
            [
                'name'          => __('Top Menu', 'virgilsecurity'),
                'id'            => 'top-menu',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        // Front Page
        register_sidebar(
            [
                'name'          => __('Use Case Content', 'virgilsecurity'),
                'id'            => 'hp-use-case-content',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('Use Case List', 'virgilsecurity'),
                'id'            => 'hp-use-cases-list',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('Client Content', 'virgilsecurity'),
                'id'            => 'hp-client-content',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('Services Content Block', 'virgilsecurity'),
                'id'            => 'hp-services-content-block',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('Intro Langs', 'virgilsecurity'),
                'id'            => 'hp-intro-langs',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('Intro Area Headline', 'virgilsecurity'),
                'id'            => 'hp-intro-area-headline',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('Intro Area Buttons', 'virgilsecurity'),
                'id'            => 'hp-intro-area-links',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('Usage Content Block', 'virgilsecurity'),
                'id'            => 'hp-usage-content-block',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('Conclusion Content Block', 'virgilsecurity'),
                'id'            => 'hp-conclusion-content-block',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );


        //Pricing
        register_sidebar(
            [
                'name'          => __('Intro Block', 'virgilsecurity'),
                'id'            => 'pricing-intro-block',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('Plans Msg', 'virgilsecurity'),
                'id'            => 'pricing-plans-msg',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('Plans List', 'virgilsecurity'),
                'id'            => 'pricing-plans-list',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('Enterprise Offer Msg', 'virgilsecurity'),
                'id'            => 'pricing-enterprise-offer-msg',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('Enterprise Offer List', 'virgilsecurity'),
                'id'            => 'pricing-enterprise-offer-list',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('Enterprise Offer Links', 'virgilsecurity'),
                'id'            => 'pricing-enterprise-offer-links',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('Includes Msg', 'virgilsecurity'),
                'id'            => 'pricing-includes-msg',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('Includes List', 'virgilsecurity'),
                'id'            => 'pricing-includes-list',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('Conclusion Msg', 'virgilsecurity'),
                'id'            => 'pricing-conclusion-msg',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        //Contacts
        register_sidebar(
            [
                'name'          => __('Contact Us Msg', 'virgilsecurity'),
                'id'            => 'contact-us-msg',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('Contact Us Block', 'virgilsecurity'),
                'id'            => 'contact-us-block',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('Partnership Msg', 'virgilsecurity'),
                'id'            => 'contact-partnership-msg',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('Partnership Contacts', 'virgilsecurity'),
                'id'            => 'contact-partnership-contacts',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('Map Address', 'virgilsecurity'),
                'id'            => 'contact-map-address',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );


        //Features
        register_sidebar(
            [
                'name'          => __('Intro Msg', 'virgilsecurity'),
                'id'            => 'features-intro-msg',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('Intro Features', 'virgilsecurity'),
                'id'            => 'features-intro-feature',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('Intro Cryptogram Msg', 'virgilsecurity'),
                'id'            => 'features-cryptogram-msg',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('Intro Cryptogram List', 'virgilsecurity'),
                'id'            => 'features-cryptogram-list',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('Components', 'virgilsecurity'),
                'id'            => 'features-components',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('Languages', 'virgilsecurity'),
                'id'            => 'features-languages',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('FAQ', 'virgilsecurity'),
                'id'            => 'features-faq',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        //About Virgil
        register_sidebar(
            [
                'name'          => __('About Virgil Intro Msg', 'virgilsecurity'),
                'id'            => 'about-virgil-intro-msg',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('About Virgil Intro List', 'virgilsecurity'),
                'id'            => 'about-virgil-intro-list',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('About Virgil Mission', 'virgilsecurity'),
                'id'            => 'about-virgil-mission',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('About Virgil Leadership', 'virgilsecurity'),
                'id'            => 'about-virgil-leadership',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('About Virgil Highlights Msg', 'virgilsecurity'),
                'id'            => 'about-virgil-highlights-msg',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('About Virgil Highlights Items', 'virgilsecurity'),
                'id'            => 'about-virgil-highlights-items',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('About Virgil Awards', 'virgilsecurity'),
                'id'            => 'about-virgil-awards',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('About Virgil Investors', 'virgilsecurity'),
                'id'            => 'about-virgil-investors',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );


        //Footer
        register_sidebar(
            [
                'name'          => __('Footer Top', 'virgilsecurity'),
                'id'            => 'footer-top',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );

        register_sidebar(
            [
                'name'          => __('Footer Bottom', 'virgilsecurity'),
                'id'            => 'footer-bottom',
                'before_widget' => __return_empty_string(),
                'after_widget'  => __return_empty_string(),
            ]
        );
    }

endif; // virgilsecurity_setup

add_action('after_setup_theme', 'virgilsecurity_setup');

require_once get_parent_theme_file_path('/inc/customizer_init.php');

require_once get_parent_theme_file_path('/inc/timber_init.php');

require_once get_parent_theme_file_path('/inc/customizer_preview.php');
