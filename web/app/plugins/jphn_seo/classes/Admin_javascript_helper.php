<?php

class Admin_javascript_helper{
    private static $name = 'Admin_javascript_helper';


    public static function get_instance(){
        return self::$name;
    }

    public static function js_init()
    {
        wp_register_script('seo-js', plugin_dir_url(__DIR__) . '/assets/js/jphn_seo.js', [], true);
        wp_enqueue_script('seo-js');
        wp_enqueue_media();
    }

}