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
				<img src="<?php echo esc_url( $featured_img['url'] ); ?>" alt="<?php echo esc_attr( $featured_img['alt'] ); ?>" />
				<?php
			endif;
			?>

			<div id="intro-info"> 
				<?php
				if ( get_field( 'project_title' ) ) :
					?>
					<h1 class='project-title'> <?php the_field( 'project_title' ); ?> </h1>
						<?php
					endif;

				if ( get_field( 'project_description' ) ) :
					?>
						<p><?php the_field( 'project_description' ); ?></p>
						<?php
					endif;
				?>
			</div>

			<h2>Planning</h2>
			<?php
			$planning = get_field( 'planning_group' );
			if ( $planning ) :
				?>
				<section id='planning'>
					<p id="planning-intro"> <?php echo esc_html( $planning['planning_text'] ); ?> </p>

					<img src="<?php echo esc_url( $planning['planning_image']['url'] ); ?>" alt="<?php echo esc_attr( $planning['planning_image']['alt'] ); ?>" />

					<div id="planning-outro"><?php echo acf_esc_html( $planning['planning_list'] ); ?></div>
				</section>
				<?php
			endif;
			?>

			<h2>Design</h2>
			<?php 
			$design = get_field( 'design_group' );
			if ( $design ) :
			?>
				<section id="design">
					<img src="<?php echo esc_url( $design['design_image']['url'] ); ?>" alt="<?php echo esc_attr( $design['design_image']['alt'] ); ?>" />

					<p id='design-intro'><?php echo esc_html( $design['design_text'] ); ?></p>

					<img src="<?php echo esc_url( $design['design_image_2']['url'] ); ?>" alt="<?php echo esc_attr( $design['design_image_2']['alt'] ); ?>" />
				</section>
				<?php
			endif;
			?>

			<h2>Development</h2>
			<?php 
			$development = get_field( 'development_group' );
			if ( $development ) :
			?>
				<section id="development">
					<p id='development-intro'><?php echo esc_html( $development['development_text'] ); ?></p>

					<div>
						<?php echo acf_esc_html( $development['development_embed'] ); ?>
					</div>
				</section>
				<?php
			endif;
			?>

			<h2>Reflections</h2>
			<?php
			$reflections = get_field( 'reflections_group' );
			if ( $reflections ) :
			?>
				<section id="reflections">
					<p id='reflections-intro'><?php echo esc_html( $reflections['reflections_text'] ); ?></p>

					<img src="<?php echo esc_url( $reflections['reflections_image']['url'] ); ?>" alt="<?php echo esc_attr( $reflections['reflections_image']['alt'] ); ?>" />
				</section>
				<?php
			endif;
			?>

			<h2 id='view-more'>View More Projects</h2>
				<?php
				$args = array( 
					'post_type' => 'coulson-projects', 
					'posts_per_page' => 2,
					'orderby' => 'rand',
				);
				$current_project = get_the_ID();

				$query = new WP_Query( $args );
				while ( $query->have_posts() ) :
					$query->the_post();
					if ( get_the_ID() !== $current_project ) :
						$more_title = get_field( 'project_title' );
						if ( $more_title ) :
							?>
							<h3 class='more-project-title'><?php echo esc_html( $more_title ); ?></h3> 
							<?php
						endif;

						$more_image = get_field( 'project_featured_image' );
						if ( ! empty( $more_image ) ) :
							?>
							<img src="<?php echo esc_url( $featured_img['url'] ); ?>" alt="<?php echo esc_attr( $featured_img['alt'] ); ?>" />
							<?php
						endif;
						?>

						<button><a href="<?php echo esc_url( get_permalink() ); ?>">View Project</a></button>
				<?php 
					endif;
				endwhile;


		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
