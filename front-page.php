<?php
/**
 * The template for displaying the home page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coulson
 */
wp_head();
get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<div class="intro-container">
				<h1>
					<span class="coulson">Chris Coulson</span>
					<span class="text"></span>
					<span class="cursor">|</span>
				</h1>
			</div>

			<div class="text-container">
				<p>Front-end web developer, designer, and lover of all things tech.</p>
			</div>
			<?php

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
