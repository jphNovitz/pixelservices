<?php
/**
 * The template for displaying all pages
 *
 */
set_query_var('custom_description', get_the_excerpt());

get_header();
?>

<main id="main"  class="site-main w-full p-12" role="main">

	<?php
	while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', 'page' );

		// If comments are open or we have at least one comment, load up the comment template.
//		if ( comments_open() || get_comments_number() ) :
//			comments_template();
//		endif;

	endwhile; 
	?>

</main>

<?php
//get_sidebar();
get_footer();