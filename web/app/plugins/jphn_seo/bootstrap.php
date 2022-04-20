<?php
/*
 * Plugin Name: Jphn Seo
 * PLungin URI:
 * Description: Help to manage some seo parameters
 * Author: Novitz Jean-Philippe <novitz@gmail.com>
 * Version: 1.0
 * Author URI: https://jphnovitz.be
 */

if (!defined('ABSPATH')) {
    die('Access denied.');
}

require_once(__DIR__ . '/classes/Init.php');

if (class_exists(Init::class)) {
    $GLOBALS['jphn_seo'] = Init::get_instance();

    register_activation_hook(__FILE__, [$GLOBALS['jphn_seo'], 'activate']);
    register_activation_hook(__FILE__, [$GLOBALS['jphn_seo'], 'activate']);
}

require_once(__DIR__ . '/classes/Add_meta_head.php');

if (class_exists(Add_meta_head::class)) {
    $GLOBALS['jphn_seo'] = Add_meta_head::get_instance();
    add_action('wp_head', [$GLOBALS['jphn_seo'], 'add_title_from_h1']); //add meta <title> and og:title based on the page title
    add_action('wp_head', [$GLOBALS['jphn_seo'], 'add_description_from_tagline']); //add meta <description> an pg:description  based on the page description
    add_action('wp_head', [$GLOBALS['jphn_seo'], 'add_og_image']); //add meta og:image
    add_action('wp_head', [$GLOBALS['jphn_seo'], 'add_og_basic_metas']); //add meta og:image
}

require_once(__DIR__ . '/classes/Admin_javascript_helper.php');

if (class_exists(Admin_javascript_helper::class)) {
    $GLOBALS['jphn_admin_js'] = Admin_javascript_helper::get_instance();

    add_action('admin_enqueue_scripts', [$GLOBALS['jphn_admin_js'], 'js_init']);
    add_action('admin_init', [$GLOBALS['jphn_admin_js'], 'js_init']);

}

/**
 * Create admin menu configuration page
 */

require_once(__DIR__ . '/classes/Admin_page.php');

if (class_exists(Admin_page::class)) {
    $GLOBALS['jphn_admin_page'] = Admin_page::get_instance();

    add_action('admin_init', [$GLOBALS['jphn_admin_page'], 'init']);
    add_action('admin_menu', [$GLOBALS['jphn_admin_page'], 'create_admin_menu']);
}