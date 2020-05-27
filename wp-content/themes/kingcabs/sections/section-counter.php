<?php if(get_theme_mod('kingcabs_counter_section_disable','off') == 'on' ){ ?> 

    <?php $kingcabs_counter_bg = get_theme_mod('kingcabs_counter_bg'); ?>

    <section class="kingcabs-counter" <?php if( !empty( $kingcabs_counter_bg ) ){ ?>style="background: url(<?php echo esc_url( $kingcabs_counter_bg ); ?>);"<?php } ?>>
        <div class="container">
            <div class="row">
                <?php
                    $kingcabstitle     = get_theme_mod('kingcabs_counter_title');
                    $kincabsicon       = get_theme_mod('kingcabs_counter_icon_title');
                    $kingcabssubtittle = get_theme_mod('kingcabs_counter_sub_title');

                    /**
                     * Main Title Section
                    */

                    kincabs_main_title( $kingcabstitle, $kincabsicon, $kingcabssubtittle );
                ?>


                <?php 
                for( $i = 1; $i < 5; $i++ ){
                    $kingcabs_counter_title = get_theme_mod('kingcabs_counter_title'.$i); 
                    $kingcabs_counter_count = get_theme_mod('kingcabs_counter_count'.$i);
                    $kingcabs_counter_icon  = get_theme_mod('kingcabs_counter_icon'.$i);
                    if($kingcabs_counter_count){
                ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="counter-area">
                            <div class="icon-counter">                                 
                                <i class="<?php echo esc_attr( $kingcabs_counter_icon ); ?>"></i>
                            </div>
                            <div class="counter-content">
                                <h2 class="counter"><?php echo absint($kingcabs_counter_count); ?></h2>
                                <h3><?php echo esc_html($kingcabs_counter_title); ?></h3>
                            </div>
                        </div>
                    </div>
                    
                <?php } } ?>
            </div>
        </div>
    </section>

<?php }