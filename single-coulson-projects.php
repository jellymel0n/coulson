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
			get_template_part( 'template-parts/content', get_post_type() );

		if ( get_field( 'project_title' ) ) :
			?>
			<h1 class='project-title'> <?php the_field( 'project_title' ); ?> </h1>
				<?php
			endif;

			$featured_img = get_field( 'project_featured_image' );
		if ( ! empty( $featured_img ) ) :
			?>
				<img src="<?php echo esc_url( $featured_img['url'] ); ?>" alt="<?php echo esc_attr( $featured_img['alt'] ); ?>" />
				<?php
			endif;

		if ( get_field( 'project_description' ) ) :
			?>
				<p><?php the_field( 'project_description' ); ?></p>
				<?php
			endif;
		?>

		<h2>Planning</h2>
		<?php
		$planning = get_field( 'planning_group' );
		if ( $planning ) :
			?>
			<section id='planning'>
				<p id="planning-intro"> <?php echo esc_html( $planning['planning_text'] ); ?> </p>

				<img src="<?php echo esc_url( $planning['planning_image']['url'] ); ?>" alt="<?php echo esc_attr( $planning['planning_image']['alt'] ); ?>" />

				<div id="planning-outro"><?php echo $planning['planning_list']; ?></div>
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
					<embed src="<?php echo esc_url( $development['development_embed']['url'] ); ?>" type="" />
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


		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
