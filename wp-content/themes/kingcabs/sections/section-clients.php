 <?php if(get_theme_mod('kingcabs_client_logo_section_disable','off') == 'on' ){ ?>
    <section class="clients kingcabs-widgets">
        <div class="container">
           <?php 
                $kingcabs_client_logo_image = get_theme_mod('kingcabs_client_logo_image');

                $kingcabs_client_logo_image = explode(',', $kingcabs_client_logo_image);
            ?>
            <div class="owl-carousel owl-theme happy-clients">
                <?php
                    foreach ($kingcabs_client_logo_image as $kingcabs_client_logo_image_single) {
                        $image = wp_get_attachment_image_src( $kingcabs_client_logo_image_single, 'medium', true);
                        $clientimage = get_post( $kingcabs_client_logo_image_single );
                ?>
                    <div class="clients-item">

                        <img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php echo esc_attr( $clientimage->post_title ); ?>" class="img-responsive">
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php }