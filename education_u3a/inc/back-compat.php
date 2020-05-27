<?php
/**
 * Back compat functionality
 *
 * @package WordPress
 */

/**
 * Prevent switching on old versions of WordPress.
 *
 * Switches to the default theme.
 */
function education_u3a_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'education_u3a_upgrade_notice' );
}
add_action( 'after_switch_theme', 'education_u3a_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch
 * on WordPress versions prior to 4.7.
 *
 * @global string $wp_version WordPress version.
 */
function education_u3a_upgrade_notice() {
	/* translators: %s: The current WordPress version. */
	$message = sprintf( __( 'This theme requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'education_u3a' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @global string $wp_version WordPress version.
 */
function education_u3a_customize() {
	wp_die(
		/* translators: %s: The current WordPress version. */
		sprintf( __( 'This theme requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'education_u3a' ), $GLOBALS['wp_version'] ),
		'',
		array(
			'back_link' => true,
		)
	);
}
add_action( 'load-customize.php', 'education_u3a_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @global string $wp_version WordPress version.
 */
function education_u3a_preview() {
	if ( isset( $_GET['preview'] ) ) {
		/* translators: %s: The current WordPress version. */
		wp_die( sprintf( __( 'This theme requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'education_u3a' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'education_u3a_preview' );
