
<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscore
 */
?>
<h1 class="trace">front-page.php</h1>
<?php get_header(); ?>

    <main>
    <?php
		if ( have_posts() ) :
            while ( have_posts() ) :
				the_post(); // récupère l'enregistrement complet (page ou article)
                // the_title('<h2>','</h2>');?>
                <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2><?php
                the_content(null, true); ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </main>    
<?php get_footer(); ?>
</html>






