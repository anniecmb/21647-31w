
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

use function FortAwesome\fa;

?>

<?php
function filtre_titre_cours($chaine) {
    $titre = substr($chaine,7);
    $titre = substr($titre, 0, strpos($titre, "("));
return $titre;
}

function filtre_description_cours($chaine) {
    $titre = wp_trim_words($chaine, 20, "...");
return $titre;
}


?>

<!-- <h1 class="trace">front-page.php</h1> -->
<?php get_header(); ?>

    <main class="site__main">

        <h2>Résultat(s) de la recherche</h2>

        <p><?php echo 'Élément de recherche « '; the_search_query(); echo '»'; ?></p>

        <section class="accueil__cours_recherche">

        <?php $article_decompte = 0; ?>
        
		<?php if ( have_posts() ) :
            while ( have_posts() ) : ?>

            <?php $article_decompte++ ?>
            
            <article class="<?php if ($boolGalerie = true) echo $class; ?>">

                <?php the_post(); // récupère l'enregistrement complet (page ou article); ?>

                <?php
                $monTableau = get_the_category();
                // echo "<pre>";print_r($monTableau);echo"</pre>";
                $boolGalerie = false;
                foreach($monTableau as $cle) {
                    if ($cle->slug == "galerie") {
                        $boolGalerie = true;
                        $class = "galerie-largeur";
                    }
                }
                ?>

                <!-- <h2><a href="<?php the_permalink() ?>"> -->
                <h2>

                <?php if ($boolGalerie == true) {
                    the_title();
                } else {
                    echo filtre_titre_cours(get_the_title());
                }
                ?></h2>

                <?php if ( has_post_thumbnail() ) { ?>
                    <div class="thumbnail">
                        <?php the_post_thumbnail('thumbnail'); ?>
                        <div>
                            <h3>Sigle du cours: <?php the_field('sigle') ?></h3>
                            <h3>Professeur: <?php the_field('professeur'); ?></h3>
                            <h4>Durée du cours: <?php the_field('duree') ?>h</h4>
                            <h4>Suis-je inscris à ce cours: <?php
                                if( get_field('je_participe') ) {
                                    echo "Oui";
                                } else {
                                    echo "Non";
                                }?></h4>
                        </div>
                    </div>
                <?php } ?>

                <?php
                if ($boolGalerie == true) {
                    the_content(null, true);
                } else {
                    echo filtre_description_cours(get_the_content(null, true));
                }
                ?>
                <a href="<?php the_permalink() ?>"><i class="fa-solid fa-arrow-right"></i></a>
                                
            </article>
            <?php endwhile; ?>
            <?php endif; ?>
        </section>
        
        <p><?php
                    echo "Nombre de résultat(s): ";
                    echo $article_decompte;
        ?></p>

        </main>    
<?php get_footer(); ?>
</html>






