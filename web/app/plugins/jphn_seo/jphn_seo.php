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
    add_theme_support('post-thumbnails');

}

function remove_supports()
{
    remove_post_type_support('page', 'excerpt');
    remove_theme_support('block-templates');
}

function load_custom_code() {
    wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'load_custom_code' );
add_action('admin_init','js_init');
function js_init() {
    wp_register_script( 'seo-js', plugin_dir_url(__FILE__) . '/assets/js/jphn_seo.js',[], true);
    wp_enqueue_script('seo-js');
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
    echo '<meta property="og:description" content="' . $description . '" />' . "\n";

}

add_action('wp_head', 'add_og_image');
function add_og_image()
{
    if (!$url =  get_the_post_thumbnail()) $url = esc_attr(get_option('seo_image'));
    echo '<meta property="og:image" content="' . $url . '" />' . "\n";

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

    echo('<br />');
    ${"image"} = esc_attr(get_option('seo_image'));

    if(${"image"}) {
        echo('<div>');
        echo '<img src="' . ${"image"} . '" style="width: 125px" id="image_preview" />';
        echo('</div>');
    }

    echo '<input value="' . ${"image"} . '" type="text" name="image" id="image_url" >';
    echo '<input type="button" value="Sélectionner" name="upload-button" id="upload-button" >';
    echo '<input type="submit"  name="seo-image-submitted" value="Valider" />';

    ?>

<?php
}




