<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package King_Cabs
 */

$post_format = get_post_format( get_the_ID() );

$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large', true);

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-post">
		<?php if( has_post_thumbnail() ){ ?>
		    <figure>
		        <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title_attribute(); ?>"></a>
		    </figure>
		<?php } ?>
	    <div class="blogpost-innerbox">
	        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

	        <?php kingcabs_posted_on(); ?>

		    <?php the_excerpt(); ?>
		    
	        <a href="<?php the_permalink(); ?>" class="btn btn-primary">
	        	<?php esc_html_e('READ MORE','kingcabs'); ?> <i class="fa fa-long-arrow-right"></i>
	        </a>

	    </div>
	</div>	
</article>