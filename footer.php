<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TryVary
 */

?>

	<footer id="colophon" class="site-footer bg-dark p-3 text-center">
		<div class="site-info">
			<?php
				printf(
					/* translators: %s: WordPress. */
					esc_html__( 'Proudly powered by %s.', 'tryvary' ),
					'<a href="' . esc_url( __( 'https://tryvary.com/', 'tryvary' ) ) . '">Tryvary</a>'
				);
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
