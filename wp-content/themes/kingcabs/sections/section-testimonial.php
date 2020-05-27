<?php if(get_theme_mod('kingcabs_testimonial_section_disable','off') == 'on' ){ ?> 
<section class="testimonials  testimonials-carousel">
    <div class="container">
        <?php
            $kingcabstitle     = get_theme_mod('kingcabs_testimonial_title');
            $kincabsicon       = get_theme_mod('kingcabs_testimonial_icon_title');
            $kingcabssubtittle = get_theme_mod('kingcabs_testimonial_sub_title');

            /**
             * Main Title Section
            */

            kincabs_main_title( $kingcabstitle, $kincabsicon, $kingcabssubtittle );
        ?>
        

        <div class="owl-carousel kc-testimonials owl-theme">
            <?php 
                $kingcabs_testimonial_page = get_theme_mod('kingcabs_testimonial_page');
                
                if( is_array( $kingcabs_testimonial_page ) ){
                    $args = array(
                        'post_type' => 'page',
                        'post__in'  => $kingcabs_testimonial_page,
                        'posts_per_page' => 12
                    );
                    $query = new WP_Query($args);

                    if($query->have_posts()): while($query->have_posts()) : $query->the_post();
            ?>
                <div class="testimonial-item">
                    
                    <div class="testimonial-img">
                        <?php if(has_post_thumbnail()){  the_post_thumbnail('medium'); } ?>
                    </div>

                   <?php the_excerpt(); ?>

                    <div class="author-content">
                        <h3><?php the_title(); ?></h3>
                    </div>

                </div>
            <?php endwhile; endif; wp_reset_postdata(); } ?>
        </div>
    </div>
</section>
<?php }