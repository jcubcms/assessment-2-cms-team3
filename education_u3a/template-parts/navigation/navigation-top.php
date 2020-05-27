<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @version 1.2
 */

?>
<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'education_u3a' ); ?>">
	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
		<?php
		echo education_u3a_get_svg( array( 'icon' => 'bars' ) );
		echo education_u3a_get_svg( array( 'icon' => 'close' ) );
		_e( 'Menu', 'education_u3a' );
		?>
	</button>

	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'top',
			'menu_id'        => 'top-menu',
		)
	);
	?>

	<?php if ( ( education_u3a_is_frontpage() || ( is_home() && is_front_page() ) ) && has_custom_header() ) : ?>
		<a href="#content" class="menu-scroll-down"><?php echo education_u3a_get_svg( array( 'icon' => 'arrow-right' ) ); ?><span class="screen-reader-text"><?php _e( 'Scroll down to content', 'education_u3a' ); ?></span></a>
	<?php endif; ?>
</nav><!-- #site-navigation -->
