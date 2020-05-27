<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package travelia
 */

?>
<div class="col-12">
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
			<span class="author"><a href="#"><i class="fa fa-user"></i> <?php travelia_posted_by();?></a><a href="<?php the_permalink();?>"> <i class="fa fa-calenders"></i> <?php echo esc_html(get_post_time('F j, Y'));?></a><a href="<?php the_permalink();?>"> <i class="fa fa-comment"></i><?php
					esc_html_e( 'Comments', 'travelia' );?> <?php echo absint(get_comments_number() );?></a></span>
		</div>
		<div class="content">
			<?php the_content();?>
		</div>
	</div>
</div>
