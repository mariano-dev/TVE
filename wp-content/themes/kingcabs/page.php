<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package King_Cabs
 */
get_header(); 

    $post_sidebar = esc_attr( get_post_meta($post->ID, 'kingcabs_page_layouts', true) );

    if( empty( $post_sidebar ) ){

        $post_sidebar = 'rightsidebar';
        
    }

    if( $post_sidebar == 'leftsidebar' || $post_sidebar == 'rightsidebar' ) :
    	$class = 'col-md-9 col-sm-8';
    else :
    	$class = 'col-md-12';
    endif;
?>
    <div class="about-right blogpost-inner-box">
        <div class="container">
            <div class="row">
                <?php
					if( $post_sidebar == 'leftsidebar' ) :
						get_sidebar();
					endif;
				?>
                <div class="<?php echo esc_attr( $class ); ?>">
                  <?php
    					while ( have_posts() ) : the_post();

    						get_template_part( 'template-parts/content', 'page' );

    						// If comments are open or we have at least one comment, load up the comment template.
    						if ( comments_open() || get_comments_number() ) :
    							comments_template();
    						endif;

    					endwhile; // End of the loop.
    				?>
                </div>
                <?php
    				if( $post_sidebar == 'rightsidebar' ) :
    					get_sidebar();
    				endif;
    			?><!-- sidebar end -->
            </div>
        </div>
    </div>

<?php get_footer();