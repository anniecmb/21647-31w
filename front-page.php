
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

<?php
function filtre_titre_cours($chaine) {
    $titre = substr($chaine,7);
    $titre = substr($titre, 0, strpos($titre, "("));
return $titre;
}
?>

<!-- <h1 class="trace">front-page.php</h1> -->
<?php get_header(); ?>

    <main class="site__main">
    <?php
		if ( have_posts() ) :
            while ( have_posts() ) :
				the_post(); // récupère l'enregistrement complet (page ou article)
                // the_title('<h2>','</h2>');?>
                <h2><a href="<?php the_permalink() ?>">
                <?php echo filtre_titre_cours(get_the_title()) ?></a></h2>
                <h3>Sigle du cours: <?php the_field('sigle') ?>h</h3>
                <h3>Professeur: <?php the_field('professeur'); ?></h3>
                <h4>Durée du cours: <?php the_field('duree') ?>h</h4>
                <h4>Suis-je inscris à ce cours: <?php
                    if( get_field('je_participe') ) {
                        echo "Oui";
                    } else {
                        echo "Non";
                    }?></h4>
                <?php the_content(null, true); ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </main>    
<?php get_footer(); ?>
</html>






