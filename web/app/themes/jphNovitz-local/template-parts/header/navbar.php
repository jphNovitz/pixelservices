<nav class="main-navigation bg-orange-50 md:bg-transparent z-20 flex flex-col md:flex-row -ml-96 md:ml-0">
    <?php
    wp_nav_menu(array(
        'theme_location' => 'menu-1',
        'menu_id' => 'primary-menu',
        'menu_class' => '
                                wfull
                                flex flex-col md:flex-row
                                md:ml-0
                                 '

    ));
    ?>
    <span class="menu-hamburger text-slate-900 absolute top-4 right-4">
                        <i class="fa fa-close  fa-2x md:hidden cursor-pointer"></i>
                    </span>
</nav>