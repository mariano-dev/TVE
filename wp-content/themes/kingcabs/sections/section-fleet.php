<?php if(get_theme_mod('kingcabs_fleet_section_disable','off') == 'on' ){ ?> 
<section id="gallery">
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <?php
                    $kingcabstitle     = get_theme_mod('kingcabs_fleet_title');
                    $kincabsicon       = get_theme_mod('kingcabs_fleet_icon_title');
                    $kingcabssubtittle = get_theme_mod('kingcabs_fleet_sub_title');

                    /**
                     * Main Title Section
                    */

                    kincabs_main_title( $kingcabstitle, $kincabsicon, $kingcabssubtittle );

                    $kingcabs_fleet_button = get_theme_mod('kingcabs_fleet_button_title','Booking Now');
                    $kingcabs_fleet_buttonurl = get_theme_mod('kingcabs_fleet_button_url');
                ?>

                <div class="gallery-nav">
                    <?php
                        $cat = get_theme_mod('kingcabs_portfolio_area_term_id');
                        $categories = explode(',', $cat);
                        if (!empty($cat) && !is_wp_error($cat)) {

                            echo "<ul>";
                                echo '<li class="active" data-filter="*">' . esc_html__('All', 'kingcabs') . '</li>';
                                foreach ($categories as $key => $category) { 
                                    $term = get_term_by( 'id', $category, 'category');
                                    echo '<li data-filter=.' . esc_attr( $term->slug ) . '>' . esc_attr( $term->name ) . '</li>';
                                }
                            echo "</ul>";
                        }
                    ?>
                </div>

                <div class="gallery-inner">
                    <div class="row">
                        <div class="isotop-active">
                         <?php
                            $args = array(
                                'post_type' => 'post',
                                'tax_query' => array(
                                    array(
                                        'taxonomy'  => 'category',
                                        'field'     => 'id', 
                                        'terms'     => $categories                                                                 
                                    )),
                                'posts_per_page' => -1
                            );

                           $i = 0;
                            $query = new WP_Query($args);
                            if ( $query->have_posts() ): while ( $query->have_posts() ): $query->the_post();
                                $term_lists = wp_get_post_terms($post->ID, 'category', array("fields" => "all"));
                               $term_slugs = array();
                               foreach ($term_lists as $term_list) {
                                   $term_slugs[] = $term_list->slug;
                               }
                               $term_slugs = join(' ', $term_slugs);

                            if ( has_post_thumbnail() ) :
                                $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'kingcabs-normal-image', true);
                            ?>
                            <div class="<?php echo esc_attr( $term_slugs ); ?> col-md-4 col-sm-6 col-xs-12">
                                <div class="gallery-single">
                                    <div class="gallery-box">
                                        <div class="gallery-head">
                                            <img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title_attribute(); ?>">
                                        </div>
                                        <div class="gallery-footer">
                                            <h4>
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="category">
                                            </h4>
                                        </div>
                                        <div class="cabbutton">
                                            <a href="<?php the_permalink(); ?>" class="btn"><i class="fa fa-link"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-content">
                                        <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                                        <?php if( !empty( $kingcabs_fleet_button ) ){ ?>
                                            <a href="<?php echo esc_url( $kingcabs_fleet_buttonurl ); ?>" class="btn btn-primary">
                                                <?php echo esc_attr( $kingcabs_fleet_button ); ?>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                             <?php endif; endwhile; wp_reset_postdata(); endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- gallery end -->
<?php }