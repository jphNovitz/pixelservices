<?php
/*
 * Plugin Name: Jphn Seo
 * PLungin URI:
 * Description: Help to manage some seo parameters
 * Author: Novitz Jean-Philippe <novitz@gmail.com>
 * Version: 1.0
 * Author URI: https://jphnovitz.be
 */


add_action('wp_head', 'add_title_from_h1');
add_action('wp_head', 'activate_excerpt');
add_post_type_support( 'page', 'excerpt' );
add_theme_support( 'block-templates' );

function add_title_from_h1(){
//    var_dump(); die;
    if (!$title = get_the_title()) $title = get_bloginfo();

    echo '<title>' .$title.' </title>';
}

function activate_excerpt()
{
    if (!$description = get_the_excerpt()) $title = bloginfo('description');
        echo '<meta name="description" content="' . $description . ' - Liège Web" />' . "\n";

}

