<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package coulson
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="footer-nav">
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'secondary',
						'menu_id'        => 'secondary-menu',
					)
				);
				?>
			<p>&copy; Chris Coulson 2021</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
