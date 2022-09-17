<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package TryVary
 */

get_header();
?>

	<main id="primary" class="site-main">

		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content-single', get_post_type() );

							?>

							<div class="article-single-navigation">
								<?php the_post_navigation(
									array(
										'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous Post:', 'tryvary' ) . '</span> <span class="nav-title">%title</span>',
										'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next Post:', 'tryvary' ) . '</span> <span class="nav-title">%title</span>',
									)
								); ?>
							</div>	

							<?php

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
					?>
				</div>
				<div class="col-md-4">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>	

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
