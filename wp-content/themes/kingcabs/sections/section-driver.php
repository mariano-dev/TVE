<?php if(get_theme_mod('kingcabs_driver_section_disable','off') == 'on' ){ ?> 
<section class="kingcabs-team kingcabs-widgets">
    <div class="container">
         <?php
            $kingcabstitle     = get_theme_mod('kingcabs_driver_title');
            $kincabsicon       = get_theme_mod('kingcabs_driver_page_title_icon');
            $kingcabssubtittle = get_theme_mod('kingcabs_driver_sub_title');

            /**
             * Main Title Section
            */

            kincabs_main_title( $kingcabstitle, $kincabsicon, $kingcabssubtittle );
        ?>

        <div class="team-carousel owl-carousel owl-theme">
        <?php 
            for( $i = 1; $i < 5; $i++ ){
                $kingcabs_driver_page_id = get_theme_mod('kingcabs_driver_page'.$i); 
                $kingcabs_driver_page_icon = get_theme_mod('kingcabs_driver_page_icon'.$i);
            
                if( $kingcabs_driver_page_id ){

                $args = array( 'page_id' => absint($kingcabs_driver_page_id) );
                $query = new WP_Query($args);
                if($query->have_posts()): while($query->have_posts()) : $query->the_post();
                $kingcabs_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'kingcabs-team-image', true); 
                $kingcabs_driver_designation = get_theme_mod('kingcabs_driver_designation'.$i);
        ?>
            <div class="team-item">
                <div class="team-head">
                    <div class="team-img">
                        <?php if(has_post_thumbnail()){ ?>
                        <img src="<?php echo esc_url( $kingcabs_image[0] ); ?>" alt="<?php the_title_attribute(); ?>">
                        <?php } ?>
                    </div>
                    <div class="team-hover">
                        <a href="<?php the_permalink();?>" class="btn"><i class="fa fa-link"></i></a>
                    </div>
                </div>
                <div class="team-box">

                    <h4 class="name"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
                    
                    <?php if($kingcabs_driver_designation){ ?>

                    <h5 class="post"><?php echo esc_html( $kingcabs_driver_designation ); ?></h5>

                    <?php } ?>
                    
                </div>
            </div>
            <?php endwhile; endif; wp_reset_postdata(); } } ?>
        </div>
    </div>
</section>
<?php }