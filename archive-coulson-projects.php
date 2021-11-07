<?php
/**
 * The template for displaying the archive page relating to the Projects CPT
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coulson
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<div class="button-group filter-button-group">
				<button class='button active' data-filter="*">All Projects</button>
				<button class='button' data-filter=".html-project">HTML/CSS</button>
				<button class='button' data-filter=".sass-project">SASS</button>
				<button class='button' data-filter=".js-project">JavaScript</button>
				<button class='button' data-filter=".cms-project">Wordpress</button>
				<button class='button' data-filter=".ecommerce-project">eCommerce</button>
			</div>

			<div id='isotope-container' class='grid'>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				
				?> 
				<div id="isotope-item" class='grid-item <?php isotope_classes( get_the_id() ); ?>'> 
					<section class="archive-project-container">
						<?php
						the_post();
						?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<header class="entry-header">
								<?php
								the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
								?>
								<div id="technology-header">
									<?php
									$technology = get_field( 'technology_used' ); 
									?>
									<ul>
									<?php
									foreach ( $technology as $single_tech ) :
										?>
										<li> 
											<?php get_template_part( '/assets/icons/tech-icons-php/inline', $single_tech ); ?>
										</li>
										<?php
									endforeach;
									?>
									</ul>
								</div>
								<?php
								?>
							</header><!-- .entry-header -->

							<div class="entry-content">
								<?php

								$featured_img = get_field( 'project_featured_image' );
								if ( ! empty( $featured_img ) ) :
									?>
										<a href=" <?php echo esc_url( get_permalink() ); ?> ">
											<img src="<?php echo esc_url( $featured_img['url'] ); ?>" alt="<?php echo esc_attr( $featured_img['alt'] ); ?>" />
										</a>
										<?php
									endif;

								if ( get_field( 'project_excerpt' ) ) :
									?>
										<p><?php the_field( 'project_excerpt' ); ?></p>
										<?php
								endif;
								?>
							</div><!-- .entry-content -->
						</article><!-- #post-<?php the_ID(); ?> -->

						
					</section>

					<div class="see-more-btn-container">
						<a href=" <?php echo esc_url( get_permalink() ); ?> " id='see-more-btn'>View Project</a>
					</div>
				</div>				
				<?php
			endwhile;
			?>
			</div>
			<?php

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
