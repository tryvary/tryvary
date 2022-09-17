<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TryVary
 */
 
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php tryvary_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'tryvary' ); ?></a>

	<header id="masthead" class="site-header">

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
		   	<div class="container">
			    <?php
		    	if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) { ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand" rel="home"><?php the_custom_logo(); ?></a>
		    	<?php }else{ ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand" rel="home"><?php bloginfo( 'name' ); ?></a>
		    	<?php }
				?>

				<!-- Brand and toggle get grouped for better mobile display -->
			    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon"></span>
			    </button>


		        <?php
			        wp_nav_menu( array(
			            'theme_location'    => 'primary',
			            'depth'             => 2,
			            'container'         => 'div',
			            'container_class'   => 'collapse navbar-collapse',
			            'container_id'      => 'navbarSupportedContent',
			            'menu_class'        => 'navbar-nav ms-auto mb-2 mb-lg-0',
			            'fallback_cb'       => 'Tryvary_Bootstrap_Navwalker::fallback',
			            'walker'            => new Tryvary_Bootstrap_Navwalker(),
			        ) );
		        ?>
		    </div>
		</nav>

	</header>
