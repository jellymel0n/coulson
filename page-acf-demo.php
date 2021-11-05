<?php
/**
 * The template for displaying the ACF Demo Page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coulson
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
            the_title( '<h1 class="entry-title">', '</h1>' );

            ?>
            <div id="tech-used">
                <h2>Tools Used</h2>
                <?php 
                $technology = get_field('demo_tech');
                ?>
                <ul>
                    <?php 
                    foreach( $technology as $single_tech) :
                        ?>
                        <li>
                            <?php 
                            get_template_part('/assets/demo/inline', $single_tech);
                            ?>
                        </li>
                        <?php
                    endforeach;
                    ?>
                </ul>
            </div>
            
                    <?php 

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();