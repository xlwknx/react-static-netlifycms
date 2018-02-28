<?php
// TODO: rename all function with virgilsecurity prefix to aloid collision
use VirgilSecurity\SectionModifications;

require_once get_parent_theme_file_path('/inc/autoloader_register.php');

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

        ///**
        // * Add default posts and comments RSS feed links to <head>.
        // */
        //add_theme_support('automatic-feed-links');

        /**
         * Enable support for post thumbnails and featured images.
         */
        add_theme_support('post-thumbnails');

        /**
         * Enable support for the following post formats:
         * aside, gallery, quote, image, and video
         */
        //add_theme_support('post-formats', ['aside', 'gallery', 'quote', 'image', 'video']);

        add_theme_support('post-formats', []);

        add_theme_support('customize-selective-refresh-widgets');

        add_theme_support('starter-content', []);


        add_shortcode('current_year', 'virgilsecurity_current_year');
        add_shortcode('github_starz_count', 'virgilsecurity_get_github_stars');

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
        add_action('admin_menu', 'virgilsecurity_customize_meta_boxes');
        //add_action('admin_head-post.php', 'virgilsecurity_hide_publishing_actions');
        //add_action('admin_head-post-new.php', 'virgilsecurity_hide_publishing_actions');

        add_action('admin_head-post-new.php', 'virgilsecurity_load_admin_style');
        add_action('admin_head-post.php', 'virgilsecurity_load_admin_style');

        add_filter('get_theme_starter_content', 'virgilsecurity_setup_starter_content', 10, 2);
        add_filter('widget_text', 'do_shortcode');
        //add_filter('black_studio_tinymce_before_text', '__return_empty_string');
        //add_filter('black_studio_tinymce_after_text', '__return_empty_string');


        //remove_all_filters('wp_editor_widget_content');

        //add_filter('wp_editor_widget_content', 'wptexturize');
        //add_filter('wp_editor_widget_content', 'convert_smilies');
        //add_filter('wp_editor_widget_content', 'convert_chars');
        ////add_filter( 'wp_editor_widget_content', 'wpautop' );
        //add_filter('wp_editor_widget_content', 'shortcode_unautop');
        //add_filter('wp_editor_widget_content', 'do_shortcode', 11);

        add_action('wpcf7_init', 'wpcf7_add_shortcode_submit_button');

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

        // Disable REST API link tag
        remove_action('wp_head', 'rest_output_link_wp_head', 10);

        // Disable oEmbed Discovery Links
        remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

        // Disable REST API link in HTTP headers
        remove_action('template_redirect', 'rest_output_link_header', 11);

        //remove_filter('the_content', 'wpautop');

        //add_filter( 'black_studio_tinymce_hide_empty', '__return_true' );

        //add_editor_style('editor-style.css');

        virgilsecurity_store_github_stars();

        //Set up user roles
        virgilsecurity_setup_roles();

        $virgilsecurity_section_mods = SectionModifications::getInstance();

        if (!$virgilsecurity_section_mods->isInitialized()) {
            $virgilsecurity_section_mods->setupDefaults();
        }
    }

    function wpcf7_add_shortcode_submit_button()
    {
        wpcf7_add_form_tag('submit_button', 'wpcf7_submit_button_shortcode_handler');
    }

    function wpcf7_submit_button_shortcode_handler($tag)
    {
        $tag = new WPCF7_FormTag($tag);

        $class = wpcf7_form_controls_class($tag->type);

        $atts = [];

        $atts['class'] = $tag->get_class_option($class);
        $atts['id'] = $tag->get_id_option();
        $atts['tabindex'] = $tag->get_option('tabindex', 'int', true);

        $value = isset($tag->values[0]) ? $tag->values[0] : '';

        if (empty($value)) {
            $value = __('Send', 'contact-form-7');
        }

        $atts['type'] = 'submit';

        $atts = wpcf7_format_atts($atts);

        $html = sprintf('<button %1$s>%2$s</button>', $atts, $value);

        return $html;
    }

    function virgilsecurity_load_admin_style()
    {
        wp_enqueue_style('admin_css', get_template_directory_uri() . '/admin-style.css', false, '1.0.0');
    }

    //function virgilsecurity_hide_publishing_actions()
    //{
    //    $my_post_type = 'POST_TYPE';
    //    global $post;
    //
    //    if ($post->post_type == $my_post_type) {
    //        echo '
    //            <style type="text/css">
    //                #misc-publishing-actions{
    //                    display:none;
    //                }
    //            </style>
    //        ';
    //    }
    //}

    function virgilsecurity_customize_meta_boxes()
    {
        //if (!current_user_can('manage_options')) {
        //    remove_meta_box('linktargetdiv', 'link', 'normal');
        //    remove_meta_box('linkxfndiv', 'link', 'normal');
        //    remove_meta_box('linkadvanceddiv', 'link', 'normal');
        //
        //    remove_meta_box('postexcerpt', 'post', 'normal');
        //    remove_meta_box('trackbacksdiv', 'post', 'normal');
        //    remove_meta_box('postcustom', 'post', 'normal');
        //    remove_meta_box('commentstatusdiv', 'post', 'normal');
        //    remove_meta_box('commentsdiv', 'post', 'normal');
        //    remove_meta_box('revisionsdiv', 'post', 'normal');
        //    remove_meta_box('authordiv', 'post', 'normal');
        //    remove_meta_box('sqpt-meta-tags', 'post', 'normal');
        //}

        //remove_meta_box('submitdiv', 'post', 'normal');
        remove_meta_box('formatdiv', 'post', 'normal');
        remove_meta_box('categorydiv', 'post', 'normal');

        remove_meta_box('pageparentdiv', 'page', 'normal');

        //remove_meta_box('submitdiv', 'page', 'normal');
    }

    function virgilsecurity_setup_roles()
    {
        $editor = get_role('editor');
        $editor->add_cap('edit_theme_options');
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

    function virgilsecurity_get_static_page_class()
    {
        $staticPageClasses = [
            ''                            => 'homePage',
            'homepage'                    => 'homePage',
            'about-virgil'                => 'aboutPage',
            'contact'                     => 'contactsPage',
            'features'                    => 'featuresPage',
            'pricing'                     => 'pricingPage',
            'terms-of-use-privacy-policy' => 'contentPage termsPage',
        ];

        return isset($staticPageClasses[virgilsecurity_get_slug()]) ? $staticPageClasses[virgilsecurity_get_slug(
        )] : 'contentPage';
    }

    function virgilsecurity_get_slug()
    {
        global $post;

        $post_slug = '';

        if (is_home()) {
            $pageForPostsId = get_option('page_for_posts');

            $pageForPosts = get_post($pageForPostsId);

            $post_slug = $pageForPosts->post_name;
        } else {
            if ($post) {
                $post_slug = $post->post_name;
            }
        }


        return $post_slug;
    }

    function virgilsecurity_setup_starter_content($content, $config)
    {
        return [
            'options' => [
                'show_on_front'  => 'page',
                'page_on_front'  => '{{homepage}}',
                'page_for_posts' => '{{blogpage}}',
            ],
            'posts'   => [
                'features'                  => [
                    'post_type'    => 'page',
                    'post_name'    => 'features',
                    'post_title'   => __('Features', 'virgilsecurity'),
                    'post_content' => __return_empty_string(),
                ],
                'pricing'                   => [
                    'post_type'    => 'page',
                    'post_name'    => 'pricing',
                    'post_title'   => __('Pricing', 'virgilsecurity'),
                    'post_content' => __return_empty_string(),
                ],
                'contact'                   => [
                    'post_type'    => 'page',
                    'post_name'    => 'contact',
                    'post_title'   => __('Contact', 'virgilsecurity'),
                    'post_content' => __return_empty_string(),
                ],
                'blogpage'                  => [
                    'post_type'    => 'page',
                    'post_name'    => 'blog',
                    'post_title'   => __('Blog', 'virgilsecurity'),
                    'post_content' => __return_empty_string(),
                ],
                'homepage'                  => [
                    'post_type'    => 'page',
                    'post_name'    => 'homepage',
                    'post_title'   => __('Homepage', 'virgilsecurity'),
                    'post_content' => __return_empty_string(),
                ],
                'terms-of-service'          => [
                    'post_type'    => 'page',
                    'post_name'    => 'terms-of-service',
                    'post_title'   => __('Terms Of Service', 'virgilsecurity'),
                    'post_content' => virgilsecurity_get_starter_content('pages', 'terms-of-service'),
                ],
                'privacy-policy'            => [
                    'post_type'    => 'page',
                    'post_name'    => 'privacy-policy',
                    'post_title'   => __('Privacy Policy', 'virgilsecurity'),
                    'post_content' => virgilsecurity_get_starter_content('pages', 'privacy-policy'),
                ],
                'iot'                       => [
                    'post_type'    => 'page',
                    'post_name'    => 'iot',
                    'post_title'   => __('Internet Of Things', 'virgilsecurity'),
                    'post_content' => __return_empty_string(),
                ],
                'end-to-end-encrypted-chat' => [
                    'post_type'    => 'page',
                    'post_name'    => 'end-to-end-encrypted-chat',
                    'post_title'   => __('End To End Encrypted Chat', 'virgilsecurity'),
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
            $link = virgilsecurity_get_permalink_by_slug($slug);
        }

        return sprintf('<li><a href="%s">%s</a></li>', $link, $label);
    }

    function virgilsecurity_get_permalink_by_slug($slug)
    {
        return get_permalink(get_page_by_path($slug));
    }

    function virgilsecurity_get_starter_content(...$path_args)
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
        $icon = isset($atts['icon']) ? $atts['icon'] : '';

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

        if ($slug != '' && virgilsecurity_get_slug() == $slug || get_the_ID() !== false && get_the_ID() == $post_id) {
            $cssClass .= ' active';
        }

        if ($link == '') {
            $link = virgilsecurity_get_permalink_by_slug($slug);
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

    function virgilsecurity_get_github_stars()
    {
        $input = file_get_contents(get_theme_file_path('storage/github.json'));

        $inputData = json_decode($input, true);

        if (array_key_exists('data', $inputData)) {

            return $inputData['data']['stargazers_count'];
        }

        return 0;
    }

    function virgilsecurity_wp_get_attachment($attachment_id)
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

    function virgilsecurity_store_github_stars()
    {
        virgilsecurit_store_github_stars_to_file(get_theme_file_path('storage/github.json'));
    }

    function virgilsecurit_store_github_stars_to_file($pathToFile, $minutes = 60)
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

endif; // virgilsecurity_setup

add_action('after_setup_theme', 'virgilsecurity_setup');

require_once get_parent_theme_file_path('/inc/customizer_init.php');

require_once get_parent_theme_file_path('/inc/timber_init.php');

require_once get_parent_theme_file_path('/inc/customizer_preview.php');