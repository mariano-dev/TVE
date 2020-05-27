<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package King_Cabs
 */

get_header(); ?>

    <section class="aboutdiv">
        <div class="container">
            <div class="row">
                
                <div class="col-md-12">
                    <div class="error-404-text">
                        <h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'kingcabs' ); ?></h1>
                        <p class="text">
                           <p><?php esc_html_e('Unfortunately, the page you were looking for could not be found. It may be temporarily unavailable, moved or no longer exists','kingcabs'); ?></p>
                           <p><?php esc_html_e('It looks like nothing was found at this location.','kingcabs'); ?></p>
                        </p>
                        <p>
	                       <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Click Here','kingcabs'); ?>
	                       </a> 
	                       	<?php esc_html_e('to go back to homepage.','kingcabs'); ?>
						</p>
                        <div class="error-404-text">
							<h1><?php esc_html_e('404','kingcabs'); ?></h1>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer();
