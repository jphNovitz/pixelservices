<?php

class Init{

    private static  $name = 'Init';

    public static function get_instance(){
        return self::$name;
    }

    function activate(){
        add_post_type_support('page', 'excerpt');
        add_theme_support('block-templates');
        add_theme_support('post-thumbnails');
    }

    function deactivate(){

        remove_post_type_support('page', 'excerpt');
        remove_theme_support('block-templates');
    }
}
