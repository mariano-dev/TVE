<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Travelia
 */

get_header();
?>

<section class="blog archive section">
	<div class="container">
		<div class="row">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'travelia' ); ?></h1>
			</header>
			<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'travelia' ); ?></p>
		</div>

	</div>
</section>


<?php
get_footer();
