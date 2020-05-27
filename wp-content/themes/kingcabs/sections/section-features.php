<?php if(get_theme_mod('kingcabs_slider_button_section_disable', 'on') == 'on' ){ ?>
<div class="slider-bottom">
    <div class="container">
        <div class="row">
            <div class="slider-bottom-inner">
                <?php 
                    $kingcabs_slider_button_page = get_theme_mod('kingcabs_slider_button_page');
                        if( is_array( $kingcabs_slider_button_page ) ){
                            $args = array(
                                'post_type' => 'page',
                                'post__in' => $kingcabs_slider_button_page,
                                'posts_per_page' => 3
                            );
                            $query = new WP_Query($args);
                            if( $query->have_posts() ){ while( $query->have_posts() ){ $query->the_post();
                ?>
                    <div class="slider-frontcontent col-md-4">
                        <div class="hover-effect">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <?php the_excerpt(); ?>
                            <div class="slider-bottom-btn">
                                <a class="btn" href="<?php the_permalink(); ?>">
                                    <?php esc_html_e('Read More','kingcabs'); ?> <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php } } wp_reset_postdata(); } ?>
            </div>
        </div>
    </div>
</div>
<?php }