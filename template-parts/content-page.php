<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TryVary
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('page-detail'); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

        <div class="entry-meta">
            <?php
            tryvary_posted_on();
            tryvary_posted_by();
            ?>
        </div><!-- .entry-meta -->
	</header><!-- .entry-header -->
    <hr/>
    <?php if( has_post_thumbnail() ) : ?>
        <div class="entry-feature-image">
            <a href="<?php print get_the_permalink( get_the_ID() ); ?>">
                <?php the_post_thumbnail("tryvary-thumb"); ?>
            </a>
        </div>
    <?php endif; ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tryvary' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'tryvary' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
