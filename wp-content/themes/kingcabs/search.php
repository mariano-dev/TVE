<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package King_Cabs
 */

get_header(); ?>


<div class="about-right blogpost-inner-box">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
                        <?php if ( have_posts() ) : ?>

                            <?php /* Start the Loop */ ?>
                            <?php while ( have_posts() ) : the_post(); ?>

                                <?php get_template_part( 'template-parts/content', 'search' ); 

                            	 endwhile; ?>

                        <?php
                            the_posts_pagination( 
                                array(
                                    'prev_text' => esc_html__( 'Prev', 'kingcabs' ),
                                    'next_text' => esc_html__( 'Next', 'kingcabs' ),
                                )
                            );
                        ?>

                        <?php else : ?>

                            <?php get_template_part( 'template-parts/content', 'none' ); ?>

                        <?php endif; ?>
                    </main><!-- #main -->
                </div><!-- #primary -->
            </div>

            <div class="col-md-3 col-sm-4 widget-area">
                <?php dynamic_sidebar( 'sidebar-1' ); ?>
            </div><!-- sidebar end -->

        </div>
    </div>
</div>
				
<?php get_footer();