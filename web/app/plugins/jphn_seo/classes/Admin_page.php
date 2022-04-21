<?php

/**
 * Class Admin_page
 */
class Admin_page
{
    const NAME = 'Admin_page';

    /**
     * @return string
     */
    public static function get_instance()
    {
        return self::NAME;
    }



    /**
     * page manager call the necessary functions
     */
    public static function seo_admin_page()
    {
        self::seo_admin_page_top();
        self::seo_admin_page_og_image_form();
        self::seo_admin_name_url();
        self::seo_admin_page_bottom();
    }


    /**
     * top of page
     */
    public static function seo_admin_page_top()
    {
        if (file_exists(plugin_dir_path(__DIR__) . 'views/admin/admin_page_top.php'))
            require_once(plugin_dir_path(__DIR__) . 'views/admin/admin_page_top.php');
    }

    /**
     *
     */
    public static function seo_admin_name_url()
    {
        if (file_exists(plugin_dir_path(__DIR__) . 'views/admin/admin_page_name_url.php'))
            require_once(plugin_dir_path(__DIR__) . 'views/admin/admin_page_name_url.php');

    }

    /**
     * bottom of page, end of container div ... submit button
     */
    public static function seo_admin_page_bottom()
    {
        if (file_exists(plugin_dir_path(__DIR__) . 'views/admin/admin_page_bottom.php'))
            require_once(plugin_dir_path(__DIR__) . 'views/admin/admin_page_bottom.php');
    }


    /***********************************************************************************************
     *  og:image section
     **********************************************************************************************/


    /**
     *
     */
    public static function seo_admin_page_og_image_form()
    {
        if (file_exists(plugin_dir_path(__DIR__) . 'views/admin/admin_page_og_image.php'))
            require_once(plugin_dir_path(__DIR__) . 'views/admin/admin_page_og_image.php');
    }

    /**
     *
     */
    public static function og_image_setting_section_callback()
    {
        echo "<p>Choisissez une image 'mise en avant' pour votre page ou votre article, celle-ci sera utilisée comme image de partage 
 sur les facebook.  Pas d'image ? Dans ce cas choisissez une l'image qui sera utilisée.</p>";
    }

    /**
     * og:image section
     */
    public static function section_meta_image()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $url = $_POST['image']) {
            update_option('seo_image', $url);
        }

        if (file_exists(plugin_dir_path(__DIR__) . 'views/admin/section_meta_image.php'))
            require_once(plugin_dir_path(__DIR__) . 'views/admin/section_meta_image.php');
    }


    /***********************************************************************************************
     *  Admin page: init, create page, create menu
     **********************************************************************************************/

    /**
     * admin page init
     */
    public static function init()
    {

        add_settings_section(
            'admin_page_setting_section',
            '<h2> <u>Image de partage sur facebook </u></h2>',
            __CLASS__ .'::og_image_setting_section_callback',
            'seo-admin-page'
        );
        add_settings_field(
            'meta_image',
            'Image pour partage facebook',
            __CLASS__ .'::section_meta_image',
            'seo-admin-page',
            'admin_page_setting_section');
    }


    /**
     * Create admin menu configuration page
     */
    public
    static function create_admin_menu()
    {
        add_menu_page('SEO', 'SEO Menu', 'manage_options', 'seo-admin-page', __CLASS__ . '::seo_admin_page', 'dashicons-tickets', 6);
    }
}