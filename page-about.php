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
				<h1> <?php the_field( 'about_header' ); ?></h1>
				<?php
			endif;
		
        $about_headshot = get_field( 'headshot_image' );
		if ( ! empty( $about_headshot ) ) :
			?>
				<img src="<?php echo esc_url( $about_headshot['url'] ); ?>" alt="<?php echo esc_attr( $about_headshot['alt'] ); ?>" />
				<?php
			endif;
        
        $about_copy = get_field( 'about_copy' );
        if ( $about_copy ) :
            ?>
            <p> <?php the_field( 'about_copy' ); ?></p>
            <?php
            endif;
            
        $contact_link = get_field( 'contact_link' );
        if ( $contact_link ) :
            ?>
            <button><a href="<?php echo esc_html( $contact_link ); ?>">Contact Me</a></button>
            <?php 
            endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();