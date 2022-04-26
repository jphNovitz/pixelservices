<?php

class Add_meta_head
{
    private static $name = "Add_meta_head";

    public static function get_instance()
    {
        return self::$name;
    }


    /**
     * add meta <title></title> based on the page title
     */
    public static function add_title_from_h1()
    {
        if (!$title = get_the_title()) $title = get_bloginfo('name');
        $GLOBALS['jphn_seo_title'] = $title;
        if (file_exists(plugin_dir_path(__DIR__) . 'views/front/add_title_from_h1.php')) {
            require_once(plugin_dir_path(__DIR__) . 'views/front/add_title_from_h1.php');
        }
    }

    /**
     * add meta <description></description> and o:description based on the page excerpt or site tagline
     */
    public static function add_description_from_tagline()
    {
        if (!$description = get_the_excerpt())
            $description = get_bloginfo('description');
        if (strlen($description) < 1)
            $description = substr(get_the_content(), 0, 200);
        $GLOBALS['jphn_seo_description'] = $description;

        if (file_exists(plugin_dir_path(__DIR__) . 'views/front/add_description_from_tagline.php'))
            require_once(plugin_dir_path(__DIR__) . 'views/front/add_description_from_tagline.php');


    }

    /**
     * add meta og:image based on the page promoted image or configuration default image
     */
    public static function add_og_image()
    {
        if (!$url = get_the_post_thumbnail_url()) $url = esc_attr(get_option('seo_image'));
        $GLOBALS['jphn_seo_image'] = $url;

        if (file_exists(plugin_dir_path(__DIR__) . 'views/front/add_og_image.php'))
            require_once(plugin_dir_path(__DIR__) . 'views/front/add_og_image.php');

    }

    /**
     * add basic og metas
     */
    public static function add_og_basic_metas()
    {
        $permalink = get_permalink();
        if (strlen($permalink) < 1) $permalink = get_home_url();
        $GLOBALS['jphn_seo_url'] = $permalink;
        $GLOBALS['jphn_seo_name'] = get_bloginfo('name');

        if (file_exists(plugin_dir_path(__DIR__) . 'views/front/add_og_basic_metas.php'))
            require_once(plugin_dir_path(__DIR__) . 'views/front/add_og_basic_metas.php');
    }


}