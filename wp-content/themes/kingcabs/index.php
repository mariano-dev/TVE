<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package King_Cabs
 */

get_header();

    $post_sidebar = esc_attr( get_post_meta( get_option( 'page_for_posts' ), 'kingcabs_page_layouts', true) );

    if( empty( $post_sidebar ) ){

        $post_sidebar = 'rightsidebar';
        
    }

    if( $post_sidebar == 'leftsidebar' || $post_sidebar == 'rightsidebar' ) :
        $class = 'col-md-9 col-sm-8';
    else :
        $class = 'col-md-12';
    endif;
?>

<div class="about-right blogpost-inner-box">
    <div class="container">
        <div class="row">

            <?php
                if( $post_sidebar == 'leftsidebar' ) :
                    get_sidebar();
                endif;
            ?>

            <div class="<?php echo esc_attr( $class ); ?>">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
                        <?php if ( have_posts() ) : ?>

                            <?php /* Start the Loop */ ?>
                            <?php while ( have_posts() ) : the_post(); ?>

                                <?php get_template_part( 'template-parts/content' ); ?>

                            <?php endwhile; ?>

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

            <?php
                if( $post_sidebar == 'rightsidebar' ) :
                    get_sidebar();
                endif;
            ?><!-- sidebar end -->

        </div>
    </div>
</div>

<?php get_footer();
