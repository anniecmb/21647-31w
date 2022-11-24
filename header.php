<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package underscore
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<style>
		.site__header {
			background-color:<?= get_theme_mod("site__title__background"); ?>;
		}
	</style>

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="masthead" class="site__header">
		<nav class="menu__primaire">
		<!-- affichage du menu principal -->
		<div class="logo"><?= get_custom_logo(); ?></div>
		<?php wp_nav_menu(array(
			"menu" => "primaire",
			"container" => "",
			"container_class" => ""));
		?>
		</nav>

		<div class="site__branding">
			<div>
				<!-- <div class="logo"><?= get_custom_logo(); ?></div> -->
					<h1 class="site__title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</h1>
				<?php
					$underscore_description = get_bloginfo( 'description', 'display' );
					if ( $underscore_description || is_customize_preview() ) :
				?>
						<p class="site__description"><?php echo $underscore_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
					<?php endif; ?>
			</div>
			<div class="entete__sidebars">
				<div><?php get_sidebar( 'header-2-acmb' ); ?></div>
				<div><?php get_sidebar( 'header-1-acmb' ); ?></div>
			</div>
		</div><!-- .site-branding -->



	</header><!-- #masthead -->

	<!-- <aside class="widget__area"> -->
	<aside class="site__menu">
		<input type="checkbox" name="chk-burger" id="chk-burger" class="chk-burger">
		<label class="burger" for="chk-burger">&#11142;</label>
		<!-- <h2>Menu secondaire</h2> -->
		<?php wp_nav_menu(array(
			"menu" => "aside",
			"container" => "nav",
			"container_class" => "menu__aside")); ?>
		
	</aside>
	
	<aside class="site__sidebar">
		<div><?php get_sidebar( 'aside-1-acmb' ); ?></div>
	</aside>
