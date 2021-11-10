<?php
/**
 * The template for displaying the thank you page.
 *
 * @package coulson
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			$thank_you_title = get_field( 'thank_you_title' );
			if ( $thank_you_title ) :
				?>
				<h1><?php echo esc_html( $thank_you_title ); ?></h1>
				<?php
			endif;

			$thank_you_subtitle = get_field( 'thank_you_subtitle' );
			if ( $thank_you_subtitle ) :
				?>
				<h2><?php echo esc_html( $thank_you_subtitle ); ?></h2>
				<?php
			endif;

			$thank_you_text = get_field( 'thank_you_text' );
			if ( $thank_you_text ) :
				?>
				<p id='thank-you-text'><?php echo esc_html( $thank_you_text ); ?></p>
				<?php
			endif;

			$thank_you_button = get_field( 'thank_you_button' );
			if ( $thank_you_button ) :
				?>
				<a href='<?php echo esc_url( $thank_you_button ); ?>' id='thank-button'>My Portfolio</a>
				<?php
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
