<?php if( get_theme_mod('kingcabs_service_page_disable','off') == 'on' ){ ?> 
<section class="service-section">
    <div class="container">

        <?php
            $kingcabstitle     = get_theme_mod('kingcabs_service_title');
            $kincabsicon       = get_theme_mod('kingcabs_service_page_title_icon');
            $kingcabssubtittle = get_theme_mod('kingcabs_service_sub_title');

            /**
             * Main Title Section
            */

            kincabs_main_title( $kingcabstitle, $kincabsicon, $kingcabssubtittle );

        $kingcabs_service_left_bg = get_theme_mod('kingcabs_service_left_bg');
        $image_id = attachment_url_to_postid( $kingcabs_service_left_bg );
        $aboutimage = get_post( $image_id );
        
        if($kingcabs_service_left_bg){ ?>

            <figure class="feature-image">

                <img src="<?php echo esc_url( $kingcabs_service_left_bg ); ?>" alt="<?php echo esc_attr( $aboutimage->post_title ); ?>" class="img-responsive">

            </figure>

        <?php } ?>
        
        <div class="row clearfix">
            <?php 
            for( $i = 1; $i < 4; $i++ ){
                $kingcabs_service_page_id = get_theme_mod('kingcabs_service_page'.$i); 
                $kingcabs_service_page_icon = get_theme_mod('kingcabs_service_page_icon'.$i,'fa fa-automobile');
            
                if($kingcabs_service_page_id){
                    $args = array( 'page_id' => absint($kingcabs_service_page_id) );
                    $query = new WP_Query($args);
                    if( $query->have_posts() ): while( $query->have_posts() ) : $query->the_post();
            ?>
                <div class="service-block col-md-4 col-sm-4 col-xs-12">
                    <div class="service-block-inner">
                        <div class="service-icon">
                            <span class="<?php echo esc_attr( $kingcabs_service_page_icon); ?>"></span>
                        </div>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="text">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; endif; wp_reset_postdata(); } } ?>
        </div>
    </div>
</section>
<?php }