<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package underscore
 */

?>

	<footer class="site__footer">
		<div><?php get_sidebar( 'footer-1-acmb' ); ?></div>
		<div><?php get_sidebar( 'footer-2-acmb' ); ?></div>
		<div><?php get_sidebar( 'footer-3-acmb' ); ?></div>
		<div><?php get_sidebar( 'footer-4-acmb' ); ?></div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
