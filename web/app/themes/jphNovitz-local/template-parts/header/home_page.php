<header class="site-header flex relative overflow-hidden min-w-screen min-h-[calc(100vw*1.56)] md:min-h-[calc(100vw*0.56)]">
    <video autoplay loop muted class="hidden  md:flex absolute -z-1  top-0 right-0 min-w-full min-h-[calc(100vw*0.56)]">
        <source src="<?php echo get_stylesheet_directory_uri(); ?>/media/Laptop_3160.mp4" type="video/mp4"/>
        Your browser does not support the video tag.
    </video>
    <div class="min-w-full <!--min-h-[calc(100vw*1.56)] --> h-full absolute z-2 flex flex-col items-start  bg-slate-50 dark:bg-black bg-opacity-50 p-6 md:p-12 items-between">
        <!--        Site Title and menu button (on mobile)-->
        <div class="w-full flex flex-col md:flex-row w-full justify-start ">
                <div class="flex flex-row w-full justify-start">
                <span class="menu-hamburger">
                    <i class="fa fa-bars  fa-2x md:hidden cursor-pointer"></i>
                </span>
                    <h1 class="site-title m-auto md:mr-auto md:ml-0 md:mr-0 text-xl min-w-max font-bold cappitalize">
                        <?php bloginfo('name'); ?>
                    </h1>
                </div>
            <?php get_template_part( 'template-parts/header/navbar', get_post_type() ); ?>
        </div>
        <!--      end  Site Title and menu button (on mobile)-->

        <div class="w-full grow  my-0 p-12 flex flex-col justify-around items-center z-10">
            <h2 class="text-black dark:text-white md:text-xl my-4 font-black">
                Liégeois.e tu est indépendant.e, commenrcant.e, entrepreneur.euse ?
                <br/> Coach.e ?
                <br>Un site internet est ton image sur le web !
            </h2>
            <a href="#" class="my-6 mx-auto p-4 bg-orange-500 rounded-xl text-white">Je veux mon site !</a>
        </div>

    </div>


</header>
