<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package King_Cabs
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php kingcabs_html_tag_schema(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="main-header" <?php if( get_header_image() ){ ?> style="background-image:url(<?php header_image(); ?>)"<?php } ?>>

    <div class="top-header">
        <div class="container">
            <div class="row">

                <div class="col-md-7 col-sm-7 col-xs-7">
                    <div class="topheader-list">
                        <?php
    						wp_nav_menu( array(
    							'theme_location' => 'menu-2',
    							'menu_id'        => 'topmenu',
    							'depth'          => 2,				
    	                    ));
    					?>
                    </div>
                </div>

                <div class="col-md-5 col-sm-5 col-xs-5 text-right">
                    <div class="topheader-list">
                        <ul>
                            <?php
        						$kingcabs_footer_follow_text = get_theme_mod('kingcabs_footer_follow_text');
        						$kingcabs_footer_follow_facebook = get_theme_mod('kingcabs_footer_follow_facebook');
        						$kingcabs_footer_follow_youtube = get_theme_mod('kingcabs_footer_follow_youtube');
        						$kingcabs_footer_follow_google = get_theme_mod('kingcabs_footer_follow_google');
        						$kingcabs_footer_follow_linkedin = get_theme_mod('kingcabs_footer_follow_linkedin');
        						$kingcabs_footer_follow_twitter = get_theme_mod('kingcabs_footer_follow_twitter');
        					?>

                            <?php if($kingcabs_footer_follow_text){ ?>

        						<li><?php echo esc_attr( $kingcabs_footer_follow_text ); ?></li>

        					<?php } if($kingcabs_footer_follow_facebook){ ?>

        						<li><a href="<?php echo esc_url( $kingcabs_footer_follow_facebook ); ?>" aria-hidden="true"><i class="fa fa-facebook-official"></i></a></li>
        					
                            <?php } if($kingcabs_footer_follow_twitter){ ?>
        						
                                <li><a href="<?php echo esc_url($kingcabs_footer_follow_twitter); ?>" aria-hidden="true"><i class="fa fa-twitter"></i></a></li>
        					
                            <?php }  if($kingcabs_footer_follow_youtube){ ?>

        						<li><a href="<?php echo esc_url($kingcabs_footer_follow_youtube); ?>" aria-hidden="true"><i class="fa fa-youtube"></i></a></li>
        					
                            <?php }  if($kingcabs_footer_follow_google){ ?>

        						<li><a href="<?php echo esc_url($kingcabs_footer_follow_google); ?>" aria-hidden="true"><i class="fa fa-google"></i></a></li>
        					
                            <?php } if($kingcabs_footer_follow_linkedin){ ?>

        						<li><a href="<?php echo esc_url($kingcabs_footer_follow_linkedin); ?>" aria-hidden="true"><i class="fa fa-linkedin"></i></a></li>
        					
                            <?php } ?>

    					</ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- top header end -->


    <div class="logo-section">
        <div class="container clearfix">
            <div class="logo-left">
                <div class="logo site-branding">
                    <?php
                        if ( function_exists( 'the_custom_logo' ) ) {
                            the_custom_logo();
                        }
                    ?>
                    <h1 class="site-title">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <?php bloginfo( 'name' ); ?>
                        </a>
                    </h1>
                    <?php
                        $description = get_bloginfo( 'description', 'display' );
                        if ( $description || is_customize_preview() ) : 
                    ?>
                        <p class="site-description"><?php echo $description; ?></p>
                    <?php endif; ?>
                </div><!-- .site-branding & End Logo -->
            </div>

            <div class="logo-right clearfix">

                <!--Info Box-->
                <div class="logo-right-info">
                    <div class="logo-right-iconbox"></span></div>
                    <?php
					    $kingcabs_header_phone = get_theme_mod('kingcabs_header_phone');
                        $phonenumber  = preg_replace("/[^0-9]/","",$kingcabs_header_phone);
					?>
                    <?php if($kingcabs_header_phone){ ?>
                        <ul>	                       		
                            <li>
                                <a href="tel:<?php echo intval( $phonenumber );?>">
                                    <?php echo esc_attr( $kingcabs_header_phone ); ?>
                                </a>
                            </li>	                            
                        </ul>
                    <?php } ?>
                </div>

                <div class="logo-right-info btn-box">
                    <?php
						$kingcabs_header_button_title = get_theme_mod('kingcabs_header_button_title');
						$kingcabs_header_button_url = get_theme_mod('kingcabs_header_button_url');
					?>

					<?php if( $kingcabs_header_button_url || $kingcabs_header_button_title  ){ ?>
                         <a href="<?php echo esc_url( $kingcabs_header_button_url );?>" class="btn btn-primary">
                            <i class="fa fa-chevron-right"></i> <?php echo esc_attr( $kingcabs_header_button_title ); ?>
                         </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div> <!--Header-Lower-->

    <div class="header-lower">
        <div class="container">
            <nav id="site-navigation" class="main-navigation clearfix">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="clearfix"></div>
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'nav-menu',
                        'fallback_cb'    => 'wp_page_menu',
                    ) );
                ?>
            </nav><!-- #site-navigation -->
        </div>
    </div>

</header><!--header end-->

<?php
  /**
   * Hook - kingcabs_head.
   *
   * @hooked kingcabs_breadcumbs - 10
   */
  do_action( 'kingcabs_breadcumbs', 10 );
?> 

