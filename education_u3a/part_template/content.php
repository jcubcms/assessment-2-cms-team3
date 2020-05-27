<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-sm-12 col-xs-12 blog-listing'); ?>>
	<div class="blog-post blog-large blog-grid list">

        <article>

            <div class="row">

            	<?php 
            	$sidebar_settings = get_theme_mod( 'sidebar_settings' , 1 );
            	$image_size = ( $sidebar_settings == 3 ? 'blog_list_no_sidebar_1' : 'blog_list' );

            	
            	if( has_post_thumbnail() ){

                    $post_image_id = get_post_thumbnail_id();
                    $image_attributes = wp_get_attachment_image_src( $post_image_id , 'medium_large' );

                    $post_image_url = '';
                    if( !empty( $image_attributes[0] ) ){
                        $post_image_url = $image_attributes[0];
                    } ?>

                    <div class="col-xs-5 list_image_wrapper"> 
        	            <header class="entry-header">
        	                <div class="entry-thumbnail" style="background-image: url( <?php echo esc_url( $post_image_url ); ?> )">
                                <div class="image-overlay"></div>
        	                </div>	         
        	            </header>
                    </div>

    	           	<?php 	           	
    	        } 

                $hide_date = get_theme_mod( 'hide_post_date' ); ?>

                <div class="<?php echo ( has_post_thumbnail() ? 'col-xs-7' : 'col-xs-12' ); ?>"> 
                    <div class="entry-content">

                        <?php 
                        $title_margin_top = 'margin-top:0';
                        if( $hide_date == false ){ ?>
                        	<div class="entry-date">
                        		<a href="<?php echo esc_url( home_url() ); ?>/<?php echo esc_attr( date( 'Y/m' , strtotime( get_the_date() ) ) ); ?>"><?php echo esc_html( get_the_date() ); ?></a>
                        	</div>
                            <?php 
                            $title_margin_top = '';
                        } ?>

                        <h4 class="entry-title" style="<?php echo esc_attr( $title_margin_top ); ?>">
                        	<a href="<?php the_permalink(); ?>">
                        		<?php the_title(); ?>			
                        	</a>
                        </h4>                    
                        
                        <?php 
                        the_excerpt();

                        $hide_author = get_theme_mod( 'hide_author' , 0 );
                        $hide_category = get_theme_mod( 'hide_category' , 0 );
                        $hide_comment = get_theme_mod( 'hide_comment' );

                        if( $hide_author == 1 && $hide_category == 1 && $hide_comment == true ){
                            $hide_meta = 'display:none;';
                        } else{
                            $hide_meta = 'display:block;';
                        } ?>

                        <div class="entry-meta" style="<?php echo esc_attr( $hide_meta ); ?>">

                            <?php                            

                            if( $hide_author == 0 ){ ?>
                                <span class="entry-author">                                    
                                    <a href="<?php echo esc_url( get_author_posts_url( $post->post_author ) ); ?>">
                                        <i class="far fa-user"></i>  <?php get_display_name( $post ); ?>
                                    </a>
                                </span>
                                <?php 
                            } 

                            $category =  post_categories( $post,1,false,false );
                            if( $hide_category == 0 && $category != false ){ ?>

                                <span class="entry-category">
                                    <?php echo wp_kses_post( $category ); ?>
                                </span>

                                <?php 
                            } 

                            if( $post->post_type == 'post' && $hide_comment == false ){ ?>

                                <span class="entry-comments">                    
                                    <?php 
                                    get_comments_number( $post );
                                    ?>
                                </span>

                                <?php 
                            } ?>
                            
                        </div>
                        
                    </div>
                </div>

            </div>

        </article>
    </div>
</div><!-- .entry-content -->
