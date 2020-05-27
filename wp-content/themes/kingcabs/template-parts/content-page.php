<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package King_Cabs
 */

$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large', true);

?>
 <div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

      <?php if( has_post_thumbnail() ){ ?>
	    <figure class="about-post-img">
	        <img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive">
	    </figure>
     <?php } ?>

    <?php

		the_content( sprintf(
			/* translators: %s: Name of current post. */
			wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'kingcabs' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kingcabs' ),
			'after'  => '</div>',
		) );
	?>
   	
   	<?php edit_post_link( esc_html__( 'Edit', 'kingcabs' ), '<span class="edit-link">', '</span>' ); ?>

</div>