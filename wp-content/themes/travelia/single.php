<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Travelia
 */

get_header();
?>
<!-- Start Contact -->
<section class="blog-single section">
	<div class="container" id="content">
		<div class="row">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'single' );

				the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
			endif;

		endwhile; // End of the loop.
		?>
	</div>
</div>
</section>
<!--/ End Cta-Newn Area -->
<?php

get_footer();
