<div class="service-area  pdt0">
    <div class="container">
        <div class="row">

            <?php
                $kingcabstitle = get_theme_mod('kingcabs_services_title');
                $kincabsicon = get_theme_mod('kingcabs_services_icon_title');
                $kingcabssubtittle = get_theme_mod('kingcabs_services_sub_title');

                /**
                 * Main Title Section
                */

                kincabs_main_title( $kingcabstitle, $kincabsicon, $kingcabssubtittle );
            ?>

            <div class="service-area-inner">
                <?php 
                    $services_page = get_theme_mod('kingcabs_services_page');
                    
                    if( is_array( $services_page ) ){
                        $args = array(
                            'post_type' => 'page',
                            'post__in' => $services_page,
                            'posts_per_page' => 12
                        );
                        $query = new WP_Query($args);

                        if($query->have_posts()): while($query->have_posts()) : $query->the_post();

                        $image_path = wp_get_attachment_image_src( get_post_thumbnail_id(), 'kingcabs-normal-image', true );
                ?>
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="service-area-block" style="background: url(<?php echo esc_url( $image_path[0] ); ?>);">
                            <div class="service-area-overlay"></div>
                            <div class="service-area-content">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="service-area-content-bottom">
                                    <a href="<?php the_permalink(); ?>" class="service-area-btn"><?php esc_html_e('Read More','kingcabs'); ?></a>
                                </div>
                            </div> 
                        </div>
                    </div>
                <?php endwhile; endif; wp_reset_postdata(); } ?>
            </div>
        </div>
    </div>
</div>