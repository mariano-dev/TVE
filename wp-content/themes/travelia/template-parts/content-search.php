<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Travelia
 */

?>
<div class="col-lg-4 col-md-6 col-sm-12">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="single-news">
			<div class="news-head">
				<?php travelia_post_thumbnail(); ?>
			</div>
			<div class="news-body">
				<div class="news-content">
					<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
					<div class="date-author">
						<p class="date"><i class="fa fa-calenders"></i><?php echo esc_html(get_post_time('j F, Y'));?></p>
						<p class="author"><span>|</span><i class="fa fa-user"></i><?php travelia_posted_by();?></p>
					</div>
					<?php the_excerpt();?>
					<a href="<?php the_permalink();?>" class="btn"><?php esc_html_e( 'Read More', 'travelia' );?> </a>
				</div>
			</div>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
</div>
