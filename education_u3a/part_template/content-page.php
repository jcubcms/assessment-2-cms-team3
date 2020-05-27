<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('detail-content single_page'); ?>>

	<div class="entry-content">

		<?php

		if( has_post_thumbnail() ){
			if( is_active_sidebar( 'sidebar-2' ) ){
				the_post_thumbnail( 'detail_image' );
			} else {
				the_post_thumbnail( 'detail_image_no_sidebar' );
			}	
		} ?>

		<header class="entry-header">
			<?php the_title( '<h3 class="blog-title">', '</h3>' ); ?>
		</header><!-- .entry-header -->

		<?php

		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'education_u3a' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'education_u3a' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
