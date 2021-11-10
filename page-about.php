<?php
/**
 * The template for displaying the about page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coulson
 */

get_header();
?>

	<main id="primary" class="site-main page-about">

		<?php
		while ( have_posts() ) :
			the_post();

			$about_header = get_field( 'about_header' );
			if ( $about_header ) :
				?>
				<section id="about-header">
					<h1> <?php the_field( 'about_header' ); ?></h1>
				</section>
				<?php
			endif;
			?>

			<div id="about-content">
				<?php
				$about_headshot = get_field( 'headshot_image' );
				if ( ! empty( $about_headshot ) ) :
					?>
					<section id="about-img">
						<?php 
						echo wp_get_attachment_image( $about_headshot, array( '275', '555' ) );
						?>
					</section>
						<?php
					endif;

				$about_copy = get_field( 'about_copy' );
				if ( $about_copy ) :
					?>
					<section id="about-copy">
						<p> <?php the_field( 'about_copy' ); ?></p>
					</section>
					<?php
					endif;
				?>
			</div>
				<?php

				$contact_link = get_field( 'contact_link' );
				if ( $contact_link ) :
					?>
					<div id="contact-link-container">
						<a href="<?php echo esc_html( $contact_link ); ?>" id='contact-link'>Contact Me</a>
					</div>
					<?php
					endif;

				?>

				<button class='accordion-tab'>My Favourite Tech</button>
				<div class="accordion-content">
					<div id="about-tech-icons">
						<?php
						$tech_items = get_field( 'project_tech_banner_icons' );
						if ( $tech_items ) :
							?>
							<ul>
							<?php
							foreach ( $tech_items as $single_item ) :
								?>
								<li> 
									<?php get_template_part( '/assets/icons/tech-icons-php/inline', $single_item ); ?>
								</li>
								<?php
							endforeach;
							?>
							</ul>
							<?php
						endif;
						?>
					</div>
				</div>
				<?php

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
