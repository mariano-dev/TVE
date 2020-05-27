<?php if(get_theme_mod('kingcabs_slider_image_carousel_section_disable','on') == 'on' ){ ?> 
<?php
    $carousel_image_category    = get_theme_mod( 'kingcabs_image_carousel_category', 1 );

    $carousel_image_no          = get_theme_mod( 'kingcabs_image_carousel_number', 3 );
    
    $carousel_args              = array(
        'cat'               => absint( $carousel_image_category ),
        'posts_per_page'    => absint( $carousel_image_no ) 
    );

    $carousel_result = new WP_Query( $carousel_args );
?>

<div class="clearfix"></div>
<div class="banner-slider">
    <div id="carousel-slider" class="carousel slide" data-interval="4000">

        <ol class="carousel-indicators">
            <?php
                $i = 0;
                while( $carousel_result->have_posts() ) : $carousel_result->the_post();
                    if( $i == 0 ) :
            ?>
                <li data-target="#carousel-slider" data-slide-to="<?php echo intval( $i ); ?>" class="active">
                </li>
            <?php $i = $i+1; else : ?>
                <li data-target="#carousel-slider" data-slide-to="<?php echo intval( $i ); ?>">
                </li>
            <?php $i = $i+1; endif; endwhile; $i = 0; wp_reset_postdata(); ?>
        </ol>

        <div class="carousel-inner">
            <?php
                $i = 0;
                while( $carousel_result->have_posts() ) : $carousel_result->the_post();
                $thumbnail_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'kingcabs-slider', true);
                if( $i == 0 ) :           
            ?>
                <div class="item active" style="background-image: url(<?php echo esc_url( $thumbnail_url[0] ); ?>);">
                    <div class="slider-overlay"></div>
                    <div class="caption-left">
                        <div class="middle-text">
                            <h2><?php the_title(); ?></h2>

                            <?php the_excerpt(); ?>

                            <?php
                                $carousel_button_title = get_theme_mod( 'kingcabs_image_carousel_button_title', 'Read More' );
                                if( !empty( $carousel_button_title ) ) :
                            ?>
                                    <a class="btn btn-primary" href="<?php the_permalink(); ?>">
                                        <?php  echo esc_html( $carousel_button_title ); ?>
                                    </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php $i = $i+1; else : ?>
                <div class="item" style="background-image: url(<?php echo esc_url( $thumbnail_url[0] ); ?>);">
                    <div class="slider-overlay"></div>
                    <div class="caption-left">
                        <div class="middle-text">
                           <h2><?php the_title(); ?></h2>

                            <?php the_excerpt(); ?>

                            <?php
                                $carousel_button_title = get_theme_mod( 'kingcabs_image_carousel_button_title', 'Read More' );
                                if( !empty( $carousel_button_title ) ) :
                            ?>
                                    <a class="btn btn-primary" href="<?php the_permalink(); ?>">
                                        <?php  echo esc_html( $carousel_button_title ); ?>
                                    </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php $i = $i+1; endif;  endwhile; $i = 0; wp_reset_postdata(); ?>
        </div>

        <a class="left carousel-control" href="#carousel-slider" role="button" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a>
        <a class="right carousel-control" href="#carousel-slider" role="button" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a>
    </div>
</div>
<?php }