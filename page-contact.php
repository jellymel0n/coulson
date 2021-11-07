<?php
/**
 * The template for displaying the contact page.
 *
 * @package coulson
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			if ( get_field( 'contact_header' ) ) :
                ?>
                <section id='contact-header'>
                    <h1><?php the_field( 'contact_header' ); ?></h1>
                </section>
                <?php
            endif;

            if ( get_field( 'contact_text' ) ) :
                ?>
                <section id="contact-body">
                    <p><?php the_field( 'contact_text' ); ?></p>
                </section>
                <?php
            endif;

            ?>
            <section id="form-container">
                <?php echo do_shortcode( '[ninja_form id=2]' ); ?>
            </section>
            <?php

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();