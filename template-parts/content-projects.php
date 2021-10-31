<?php
/**
 * Template part for displaying posts on projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coulson
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
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

		if ( get_field( 'project_description' ) ) :
			?>
				<p><?php the_field( 'project_description' ); ?></p>
				<?php
		endif;
		?>
		<button><a href=" <?php echo esc_url( get_permalink() ); ?> ">See More</a></button>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
