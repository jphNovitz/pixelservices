<?php
/**
 * Template part for displaying posts
 */

?>

<article id="post-<?php the_ID(); ?>" class="entry">
    <header class="entry-header mb-12 font-bold text-xl">
        <h1 class="text-3xl"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    </header>

    <div class="entry-content text-lg">
        <?php
        if (has_post_thumbnail()):
            the_post_thumbnail('medium', [
                    'class'=> 'rounded-md shadow-xl  shadow-slate-700 float-left mr-12 mb-12'
            ]);
        endif;
        the_content([
                'class' => 'text-lg'
        ]);
        ?>
    </div>
</article>