<header class="site-header flex relative overflow-hidden min-w-screen min-h-[calc(100vw*1.56)] md:min-h-[calc(100vw*0.56)]">
    <video autoplay loop muted class="hidden  md:flex absolute -z-1  top-0 right-0 min-w-full min-h-[calc(100vw*0.56)]">
        <source src="<?php echo get_stylesheet_directory_uri(); ?>/media/Laptop_3160.mp4" type="video/mp4"/>
        Your browser does not support the video tag.
    </video>
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/media/liege_passerelle_mobile.png" alt="Photo passerelle belle liegeoise  de liege" class="flex  md:hidden absolute -z-1  top-0 right-0 min-w-full min-h-[calc(100vw*0.56)]">
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

        <div class="w-full grow  my-0  flex flex-col justify-center items-left z-10 text-black dark:text-white text-2xl my-4 font-black">

            Liégeois.e tu est :
            <ul class="fa-ul">
                <li class=""><span class="fa-li"><i class="fas fa-check"></i></span>Indépendante</li>
                <li class=""><span class="fa-li"><i class="fas fa-check"></i></span>Commenrcant</li>
                <li class=""><span class="fa-li"><i class="fas fa-check"></i></span>Entrepreneuse </li>
                <li class=""><span class="fa-li"><i class="fas fa-check"></i></span>Coach </li>
            </ul>
            <p>Un site internet est ton image sur le web&nbsp;!</p>
            <a href="#" class="my-6 mx-auto p-4 bg-orange-500 rounded-xl text-white">Je veux mon site&nbsp;!</a>
        </div>

    </div>


</header>
