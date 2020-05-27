<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Travelia
 */

?>
<div class="col-12">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if(has_post_thumbnail()): ?>
			<div class="image">
				<?php 
				the_post_thumbnail();
				?>
			</div>
		<?php endif;?>

		<div class="blog-detail">
			<h2 class="blog-title"><?php the_title();?></h2>
			<div class="blog-meta">
				<span class="author"><a href="#"><i class="fa fa-user"></i> <?php travelia_posted_by();?></a><a href="<?php the_permalink();?>"> <i class="fa fa-calendar"></i> <?php echo esc_html(get_post_time('F j, Y'));?></a><a href="<?php the_permalink();?>"> <i class="fa fa-comment"></i><?php
				esc_html_e( 'Comments', 'travelia' );?> <?php echo absint(get_comments_number() );?></a></span>
			</div>
			<div class="content">
				<?php the_content();
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'travelia' ),
					'after'  => '</div>',
				) );
				?>
			</div>
		</div>
		<?php if ( get_edit_post_link() ) : ?>
			<footer class="entry-footer">
				<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'travelia' ),
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
	</article>
</div>

