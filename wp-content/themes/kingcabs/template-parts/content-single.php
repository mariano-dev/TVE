<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package King_Cabs
 */

$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large', true);

$post_format = get_post_format( get_the_ID() );

?>
 
<div class="blog-post">
    <?php if( has_post_thumbnail() ){ ?>
        <figure>
            <img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive">
        </figure>
    <?php } ?>
    <div class="blogpost-inner-box">
            
        <?php if( $post_format != 'aside' ){ kingcabs_posted_on(); } ?>

        <?php 
    	    the_content( sprintf(
    	      /* translators: %s: Name of current post. */
    	      wp_kses( esc_html__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'kingcabs' ), array( 'span' => array( 'class' => array() ) ) ),
    	      the_title( '<span class="screen-reader-text">"', '"</span>', false )
    	    ) );

    	    wp_link_pages( array(
    		    'before'            => '<div class="desc-nav">'.esc_html__( 'Pages:', 'kingcabs' ),
    		    'after'             => '</div>',
    		    'link_before'       => '<span>',
    		    'link_after'        => '</span>'
    	    ) );
    	?>
    </div>

    <div class="news-tag"> 
        <?php the_category(); ?>       
        <?php the_tags( '<ul><li><i class="fa fa-tag"></i></li><li>', '</li><li>', '</li></ul>' ); ?>
    </div>
</div>