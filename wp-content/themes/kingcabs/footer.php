<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package King_Cabs
 */
?>
    <footer>
        <div class="footerup">
            <div class="container">
               <?php
                    $kingcabs_footer_top_title = get_theme_mod('kingcabs_footer_top_title');
                    $kingcabs_footer_top_button_title = get_theme_mod('kingcabs_footer_top_button_title');
                    $kingcabs_footer_top_button_url_title = get_theme_mod('kingcabs_footer_top_button_url_title');
                ?>

                <?php if( $kingcabs_footer_top_title || $kingcabs_footer_top_button_title || $kingcabs_footer_top_button_url_title ){ ?>
                <div class="call-to-action">

                    <h2>
                        <?php if($kingcabs_footer_top_title){ ?>
                            <span><strong><?php echo esc_html( $kingcabs_footer_top_title ); ?></strong></span>
                        <?php } ?>
                    </h2>

                    <?php if($kingcabs_footer_top_button_url_title){ ?>
                        <a href="<?php echo esc_url( $kingcabs_footer_top_button_url_title ); ?>" class="btn btn-primary pull-right">
                    <?php } ?>

                    <?php if($kingcabs_footer_top_button_title){ ?>
                        <i class="fa fa-chevron-right"></i> <?php echo esc_html($kingcabs_footer_top_button_title); ?> </a>
                    <?php } ?>
                    
                </div>
                <?php }?>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="row clearfix">

                        <?php if( is_active_sidebar( 'footer-1' ) ) : ?>
                        <div class="footer-column col-md-7 col-sm-6 col-xs-12">
                            <?php dynamic_sidebar( 'footer-1' ); ?>
                        </div>
                       <?php endif; ?>

                        <?php if( is_active_sidebar( 'footer-2' ) ) : ?>
                        <div class="footer-column col-md-5 col-sm-6 col-xs-12">
                            <?php dynamic_sidebar( 'footer-2' ); ?>
                        </div>
                        <?php endif; ?>     

                    </div>
                </div>

                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="row clearfix">

                        <?php if( is_active_sidebar( 'footer-3' ) ) : ?>
                        <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                            <?php dynamic_sidebar( 'footer-3' ); ?>
                        </div>
                        <?php endif; ?>

                         <?php if( is_active_sidebar( 'footer-4' ) ) : ?>
                        <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                           <?php dynamic_sidebar( 'footer-4' ); ?> 
                        </div>
                        <?php endif; ?>

                    </div>
                </div>

                <div class="footer-bottom">
                    <div class="col-md-6">
                        <div class="text text-left"><?php do_action( 'kingcabs_copyright', 5 ); ?></div>
                    </div>
                    <div class="col-md-6">
                        <ul class="social-links text-right">
                            <?php
                                $kingcabs_footer_follow_facebook = get_theme_mod('kingcabs_footer_follow_facebook');
                                $kingcabs_footer_follow_youtube = get_theme_mod('kingcabs_footer_follow_youtube');
                                $kingcabs_footer_follow_google = get_theme_mod('kingcabs_footer_follow_google');
                                $kingcabs_footer_follow_linkedin = get_theme_mod('kingcabs_footer_follow_linkedin');
                                $kingcabs_footer_follow_twitter = get_theme_mod('kingcabs_footer_follow_twitter');
                            ?>

                            <?php if($kingcabs_footer_follow_facebook){ ?>

                                <li><a href="<?php echo esc_url( $kingcabs_footer_follow_facebook ); ?>" aria-hidden="true" target="_blank"><i class="fa fa-facebook-official"></i></a></li>
                            
                            <?php } if($kingcabs_footer_follow_twitter){ ?>
                                
                                <li><a href="<?php echo esc_url($kingcabs_footer_follow_twitter); ?>" aria-hidden="true" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            
                            <?php }  if($kingcabs_footer_follow_youtube){ ?>

                                <li><a href="<?php echo esc_url($kingcabs_footer_follow_youtube); ?>" aria-hidden="true" target="_blank"><i class="fa fa-youtube"></i></a></li>
                            
                            <?php }  if($kingcabs_footer_follow_google){ ?>

                                <li><a href="<?php echo esc_url($kingcabs_footer_follow_google); ?>" aria-hidden="true" target="_blank"><i class="fa fa-google"></i></a></li>
                            
                            <?php } if($kingcabs_footer_follow_linkedin){ ?>

                                <li><a href="<?php echo esc_url($kingcabs_footer_follow_linkedin); ?>" aria-hidden="true" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <a class="scroll-top fa fa-angle-up" href="javascript:void(0)"></a>

    <?php wp_footer();?>

</body>
</html>