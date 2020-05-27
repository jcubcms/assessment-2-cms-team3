<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @version 1.0
 */

?>
<div class="site-info">
	<?php
	if ( function_exists( 'the_privacy_policy_link' ) ) {
		the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
	}
	?>
	<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'education_u3a' ) ); ?>" class="imprint">
		<?php
			/* translators: %s: WordPress */
		printf( __( 'Proudly powered by %s', 'education_u3a' ), 'WordPress' );
		?>
	</a>
</div><!-- .site-info -->
