
<header class="site-header flex relative  min-w-screen h-40 md:h-40">
    <div class="min-w-full h-30 absolute z-2 flex flex-col items-start  bg-slate-50 dark:bg-black bg-opacity-50 p-6 md:p-12">
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

    </div>


</header>
