<?php
/*
 * Plugin Name: Jphn Seo
 * PLungin URI:
 * Description: Help to manage some seo parameters
 * Author: Novitz Jean-Philippe <novitz@gmail.com>
 * Version: 1.0
 * Author URI: https://jphnovitz.be
 */

require_once('views/seo-admin-page.php');
register_activation_hook(__FILE__, 'add_supports');
register_deactivation_hook(__FILE__, 'remove_supports');

function add_supports()
{
    add_post_type_support('page', 'excerpt');
    add_theme_support('block-templates');
}

function remove_supports()
{
    remove_post_type_support('page', 'excerpt');
    remove_theme_support('block-templates');
}

/**
 * add meta <title></title> based on the page title
 */
add_action('wp_head', 'add_title_from_h1');
function add_title_from_h1()
{
//    var_dump(get_the_content()); die;
    if (!$title = get_the_title()) $title = get_bloginfo('name');

    echo '<title>' . $title . ' </title>' . "\n";
    echo '<meta property="og:title" content="' . $title . '"/>' . "\n";
}


/**
 * add meta <title></title> based on the page title
 */
add_action('wp_head', 'add_description_from_tagline');
function add_description_from_tagline()
{
    if (!$description = get_the_excerpt()) $description = get_bloginfo('description');
    if (strlen($description) < 1) $description = substr(get_the_content(), 0, 200);
    echo '<meta name="description" content="' . $description . ' - Liège Web" />' . "\n";
    echo '<meta property="og:description" content="' . $description . '" fff/>' . "\n";

}

/**
 * Create admin menu configuration page
 */
add_action('admin_menu', 'my_admin_menu');

function my_admin_menu()
{
    add_menu_page('SEO', 'SEO Menu', 'manage_options', 'seo-admin-page', 'seo_admin_page', 'dashicons-tickets', 6);
}

add_action( 'admin_init', 'my_settings_init' );

function my_settings_init() {

    add_settings_section(
        'sample_page_setting_section',
        '<h2> <u>Image de partage sur facebook </u></h2>',
        'my_setting_section_callback_function',
        'seo-admin-page'
    );
    add_settings_field(
        'meta_image',
        'Image pour partage facebook',
        'jphn_section_meta_image',
        'seo-admin-page',
        'sample_page_setting_section');
}

function my_setting_section_callback_function() {
    echo "<p>Choisissez une image 'mise en avant' pour votre page ou votre article, celle-ci sera utilisée comme image de partage 
 sur les facebook.  Pas d'image ? Dans ce cas choisissez une l'image qui sera utilisée.</p>";
}

function jphn_section_meta_image()
{
    ${"image"} = esc_attr(get_option('image'));

    echo '<img src="' . ${"image"} . '" style="width: 125px" id="image_preview" />';
    echo '<input value="' . ${"image"} . '" type="hidden" name="image" id="image" >';
    echo '<input type="button" value="Upload Image" name="submit" id="upload-button" >';
}




/*
add_action( 'admin_init', 'jphn_settings_init' );
function jphn_settings_init()
{
    register_setting('seo-admin-page', 'meta_image');

    add_settings_section(
        'jphn_section_meta_image',
        'Image Meta',
        'jphn_meta_image_section_callback',
        'seo-admin-page'
    );

    add_settings_field(
        'meta_image',
        'Image pour partage facebook',
        'jphn_section_meta_image',
        'seo-admin-page',
        'jphn_meta_image');

/*    ${"image"} = esc_attr(get_option('image'));

    echo '<img src="' . ${"image"} . '" style="width: 125px" id="image_preview" />';
    echo '<input value="' . ${"image"} . '" type="hidden" name="image" id="image" >';
    echo '<input type="button" value="Upload Image" name="submit" id="upload-button" >';*/
//}
/*
function jphn_meta_image_section_callback()
{
    echo '<p>TATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYO</p>';
    echo '<p>TATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYO</p>';
    echo '<p>TATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYO</p>';
    echo '<p>TATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYO</p>';
    echo '<p>TATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYO</p>';
    echo '<p>TATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYO</p>';
    echo '<p>TATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYO</p>';
    echo '<p>TATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYO</p>';
    echo '<p>TATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYO</p>';
    echo '<p>TATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYO</p>';
    echo '<p>TATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYO</p>';
    echo '<p>TATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYO</p>';
    echo '<p>TATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYO</p>';
    echo '<p>TATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYO</p>';
    echo '<p>TATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYO</p>';
    echo '<p>TATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYO</p>';
    echo '<p>TATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYOTATA YOYO</p>';
}*/




