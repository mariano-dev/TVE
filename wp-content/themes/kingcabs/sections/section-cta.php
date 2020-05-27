 <?php
  if(get_theme_mod('kingcabs_call_to_action_page_disable','off') == 'on' ){ 

    $cta_page = get_theme_mod( 'kingcabs_call_to_action_page', 1 );
    $cta = new WP_Query( array(
        'page_id'       => absint( $cta_page ),
        'post_type'     => 'page',
        'posts_per_page'=> 1

    ) );

    while( $cta->have_posts() ) : $cta->the_post();

    $cta_background_url = wp_get_attachment_url( get_post_thumbnail_id(), 'large' );
?>
 <section class="call-us" style="background: url(<?php echo esc_url( $cta_background_url ); ?>) no-repeat;">
    <div class="overlay"></div>
        <div class="container">
            <div class="call-bx">
                <h2 class="call-title"><?php the_title(); ?></h2>
                <div class="call-bx-inner">
                    <div class="call-bx-details">
                        <p><?php echo esc_attr( wp_trim_words( get_the_content(), 250 ) ); ?></p>
                    </div>
                    <?php
                        $kingcabs_call_to_action_button_text = get_theme_mod('kingcabs_call_to_action_button_text');
                        $kingcabs_call_to_action_button_number = get_theme_mod('kingcabs_call_to_action_button_number');
                    ?>
                    <div class="phn-icon-circle">
                        <a href="tel:<?php echo esc_attr( $kingcabs_call_to_action_button_number); ?>"><i class="fa fa-phone"></i></a>
                    </div>                        
                    <?php if($kingcabs_call_to_action_button_text || $kingcabs_call_to_action_button_number){ ?>
                        <div class="call-us-text">
                            <?php if($kingcabs_call_to_action_button_text){ ?>

                            <h3><?php echo esc_attr( $kingcabs_call_to_action_button_text ); ?></h3>

                            <?php } if($kingcabs_call_to_action_button_number){ ?>
                            <h2>
                                <a href="tel:<?php echo esc_attr( $kingcabs_call_to_action_button_number); ?>">

                                    <?php echo esc_html( $kingcabs_call_to_action_button_number ); ?>

                                </a>
                            </h2>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
</section>
<?php endwhile; wp_reset_postdata(); } 