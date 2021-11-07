<?php
/**
 * The template for displaying all single posts within the projects CPT.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package coulson
 */

get_header();
?>

	<main id="primary" class="site-main project-container">

		<?php
		while ( have_posts() ) :
			the_post();

			$featured_img = get_field( 'project_featured_image' );
			if ( ! empty( $featured_img ) ) :
				?>
				<img src="<?php echo esc_url( $featured_img['url'] ); ?>" alt="<?php echo esc_attr( $featured_img['alt'] ); ?>" id='single-img' />
				<?php
			endif;
			?>

			<?php	
			if ( get_field( 'project_title' ) ) :
				?>
				<h1 class='project-title'> <?php the_field( 'project_title' ); ?> </h1>
					<?php
			endif;
			?>

			<div id="links">		
				<div id="live-site-link">
					<?php
					$live_site_link = get_field('live_site_link');
					if ( $live_site_link ) :
						?>
						<a href="<?php echo esc_url( $live_site_link['url'] ) ?>" target='_blank'>Live Site</a>
						<?php
					endif;
					?>
				</div>

				<div id="github-link">
					<?php
					$github_link = get_field('github_link');
					if ( $github_link ) :
						?>
						<a href="<?php echo esc_url( $github_link['url'] ) ?>" target='_blank'>GitHub</a>
						<?php
					endif;
					?>
				</div>
			</div>

			<div id="intro-info"> 
				<?php 
				if ( get_field( 'project_description' ) ) :
					?>
						<p><?php the_field( 'project_description' ); ?></p>
						<?php
					endif;
				?>
			</div>

			<div id="tech-container">
				<div id="technology-used">
					<h2>Development Tools</h2>
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

				<div id="other-technology">
					<h2>Other Tools</h2>
					<?php
					$other_technology = get_field( 'other_technology' ); 
					?>
					<ul>
					<?php
					foreach ( $other_technology as $single_other_tech ) :
						?>
						<li> 
							<?php get_template_part( '/assets/icons/tech-icons-php/inline', $single_other_tech ); ?>
						</li>
						<?php
					endforeach;
					?>
					</ul>
				</div>
			</div>

			<button class='accordion-tab'>Planning</button>
			<div class="accordion-content">
				<?php
				$planning = get_field( 'planning_group' );
				if ( $planning ) :
					?>
					<section id='planning'>
						<p id="planning-intro"> <?php echo acf_esc_html( $planning['planning_text'] ); ?> </p>

						<figure>
							<img src="<?php echo esc_url( $planning['planning_image']['url'] ); ?>" alt="<?php echo esc_attr( $planning['planning_image']['alt'] ); ?>" />
							<figcaption><?php echo esc_html( $planning['planning_image']['caption'] ); ?></figcaption>
						</figure>

						<div id="planning-outro"><?php echo acf_esc_html( $planning['planning_list'] ); ?></div>
					</section>
					<?php
				endif;
				?>
			</div>

			<button class='accordion-tab'>Design</button>
			<div class="accordion-content">
				<?php
				$design = get_field( 'design_group' );
				if ( $design ) :
					?>
					<section id="design">
						<img id="design-img" src="<?php echo esc_url( $design['design_image']['url'] ); ?>" alt="<?php echo esc_attr( $design['design_image']['alt'] ); ?>" />

						<p id='design-intro'><?php echo acf_esc_html( $design['design_text'] ); ?></p>

						<?php if ( $design['design_img_2'] ) : ?>
							<img src="<?php echo esc_url( $design['design_image_2']['url'] ); ?>" alt="<?php echo esc_attr( $design['design_image_2']['alt'] ); ?>" />
						<?php endif; ?>
					</section>
					<?php
				endif;
				?>
			</div>

			<button class='accordion-tab'>Development</button>
			<div class="accordion-content">
				<?php
				$development = get_field( 'development_group' );
				if ( $development ) :
					?>
					<section id="development">
						<p id='development-intro'><?php echo acf_esc_html( $development['development_text'] ); ?></p>

						<div>
							<?php echo acf_esc_html( $development['development_embed'] ); ?>
						</div>
					</section>
					<?php
				endif;
				?>
			</div>

			<button class='accordion-tab'>Reflections</button>
			<div class="accordion-content">
				<?php
				$reflections = get_field( 'reflections_group' );
				if ( $reflections ) :
					?>
					<section id="reflections">
						<p id='reflections-intro'><?php echo acf_esc_html( $reflections['reflections_text'] ); ?></p>

						<img src="<?php echo esc_url( $reflections['reflections_image']['url'] ); ?>" alt="<?php echo esc_attr( $reflections['reflections_image']['alt'] ); ?>" />
					</section>
					<?php
				endif;
				?>
			</div>

			<h2 id='view-more'>View More Projects</h2>
			<div id='view-more-section'>
				<?php
				$args            = array(
					'post_type'      => 'coulson-projects',
					'posts_per_page' => 2,
					'orderby'        => 'rand',
					'post__not_in'   => array(
						get_the_ID(),
					)
				);
				$current_project = get_the_ID();

				$query = new WP_Query( $args );
				while ( $query->have_posts() ) :
					?>
					<div class='view-more-container'>
						<?php
						$query->the_post();
						$more_title = get_field( 'project_title' );
						if ( $more_title ) :
							?>
							<h3 class='more-project-title'><?php echo esc_html( $more_title ); ?></h3> 
							<?php
						endif;

						$more_image = get_field( 'project_featured_image' );
						if ( ! empty( $more_image ) ) :
							?>
							<img src="<?php echo esc_url( $more_image['url'] ); ?>" alt="<?php echo esc_attr( $more_image['alt'] ); ?>" />
							<?php
						endif;
						?>

						<button><a href="<?php echo esc_url( get_permalink() ); ?>">View Project</a></button>
						<?php
						?>
					</div>
					<?php
				endwhile;
				wp_reset_postdata();
			?>
			</div>
			<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
