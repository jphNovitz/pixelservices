<?php
/**
 * Template part for displaying posts
 */

?>

<article id="post-<?php the_ID(); ?>" class="entry">
	<header class="entry-header mb-12 font-bold text-xl">
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>
</article>