<?php
/**
 * The main template file
 */

get_header();
?>

<main id="main" class="site-main max-w-7xl mx-auto" role="main">

    <section class="w-full flex flex-wrap justify-around mt-12">
        <article class="w-1/2 md:w-1/3 my-4 flex flex-col items-center">
            <div class="img-thunbnail"
                 style="background-image: url(<?php echo get_stylesheet_directory_uri() . "/media/baguette.webp" ?>)">
            </div>
            <div class="img-thunbnail-label">Sandwicherie et HoReCa</div>
        </article>

        <article class="w-1/2 md:w-1/3 my-4 flex flex-col items-center">
            <div class="img-thunbnail"
                 style="background-image: url(<?php echo get_stylesheet_directory_uri() . "/media/non_profit_01.webp" ?>)">

            </div>
            <div class="img-thunbnail-label">Associations et ASBL</div>
        </article>

        <article class="w-1/2 md:w-1/3 my-4 flex flex-col items-center">
            <div class="img-thunbnail"
                 style="background-image: url(<?php echo get_stylesheet_directory_uri() . "/media/barber_01.webp" ?>)">
            </div>
            <div class="img-thunbnail-label">Coiffeuse, barbier.e</div>
        </article>
   <!-- </section>
    <section class="w-full flex flex-wrap justify-around mt-12">-->
        <article class="w-1/2 md:w-1/3 my-4 flex flex-col items-center">
            <div class="img-thunbnail"
                 style="background-image: url(<?php echo get_stylesheet_directory_uri() . "/media/entrepreneur_01.webp" ?>)">

            </div>
            <div class="img-thunbnail-label">Entrepreneuses et Indépendants</div>
        </article>

        <article class="w-1/2 md:w-1/3 my-4 flex flex-col items-center hidden md:flex">
            <div class="img-thunbnail"
                 style="background-image: url(<?php echo get_stylesheet_directory_uri() . "/media/artisan_01.webp" ?>)">
            </div>
            <div class="img-thunbnail-label">Artisan</div>
        </article>

    </section>
    <section class="w-full p-12 flex flex-col md:flex-row">
        <article class="w-full md:w-1/2 flex text-2xl italix font-bold text-slate-800 justify-center md:justify-left p-4 text-center md:text-left items-center">
            <p>Toutes les pages facebook se ressemble.
                <br/>Un site internet est ton image sur le web, ta marque.
                <br/>Crée ton site web et devient indépendant !
            </p>
        </article>
        <article class="w-full md:w-1/2  flex justify-center mt-16 md:mt-0  p-4 ">
            <img src="<?php echo get_stylesheet_directory_uri() . "/media/open_shop_01.webp" ?>"
                 alt="Panneau Open (ouvert) sur une porte "
                 class="rounded-xl">
        </article>
    </section>

<?php
/*if ( have_posts() ) : while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', get_post_type() );

	endwhile;

	the_posts_pagination( array(
		'prev_text' => __( 'Previous page' ),
		'next_text' => __( 'Next page' ),
	) );

endif;
*/?>

</main>

<?php
get_sidebar();
get_footer();