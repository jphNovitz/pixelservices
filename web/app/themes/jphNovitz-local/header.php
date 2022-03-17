<?php
/**
 * The header for the theme
 *
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/bc8956f3e3.js" crossorigin="anonymous"></script>
    <?php wp_head(); ?>
</head>

<body class="bg-black text-slate-50" <?php body_class(); ?>>

<a class="screen-reader-text" href="#content">Skip to content</a>

<header class="site-header relative overflow-hidden min-w-screen  min-h-screen md:min-h-[calc(100vw*0.56)]">
    <video autoplay loop muted class="hidden  md:flex absolute -z-1  top-0 right-0 min-w-full min-h-[calc(100vw*0.56)]">
        <source src="<?php echo get_stylesheet_directory_uri(); ?>/media/Laptop_3160.mp4" type="video/mp4"/>
        Your browser does not support the video tag.
    </video>
    <div class="min-w-full min-h-[calc(100vw*0.56)] absolute z-2 flex flex-col items-start  bg-black bg-opacity-50 p-6 md:p-12">
        <!--        Site Title and menu button (on mobile)-->
        <div class="w-full flex flex-col md:flex-row w-full justify-start items-center">
            <div class="flex flex-row w-full justify-start ">
                <span class="menu-hamburger">
                    <i  class="fa fa-bars  fa-2x md:hidden cursor-pointer"></i>
                </span>
                <h1 class="site-title m-auto md:mr-auto md:ml-0 md:mr-0 text-xl min-w-max font-bold cappitalize">
                    <?php bloginfo('name'); ?>
                </h1>
            </div>
            <nav class="main-navigation -ml-96">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'menu-1',
                    'menu_id' => 'primary-menu',
                    'menu_class' => 'wfull 
                                flex flex-col md:flex-row
                                 md:ml-0'

                ));
                ?>
                <span class="menu-hamburger absolute top-4 right-4">
                    <i  class="fa fa-close  fa-2x md:hidden cursor-pointer"></i>
                </span>
            </nav>
        </div>
        <!--      end  Site Title and menu button (on mobile)-->

        <div class="w-full  flex-1 my-0 p-12 flex basis-full flex-col justify-around items-center">
            <h2 class="text-white md:text-xl my-4 font-black">
                Liégeois.e tu est indépendant.e, commenrcant.e, entrepreneur.euse ?
                <br/> Coach.e ?
                <br>Un site internet est ton image sur le web !
            </h2>
            <a href="#" class="my-6 mx-auto p-4 bg-orange-500 rounded-xl ">Je veux mon site !</a>
        </div>
    </div>


</header>

<div id="content" class="site-content">
	
