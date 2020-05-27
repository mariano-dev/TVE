<?php
/**
 * Customizer Custom Control Class Layout 
*/

if(class_exists( 'WP_Customize_control')) {    

    /**
     * Upload Gallery Image in customizer
    */
    class Kingcabs_Display_Gallery_Control extends WP_Customize_Control{
        public $type = 'gallery';         
        public function render_content() { ?>
        <label>
            <span class="customize-control-title">
                <?php echo esc_html( $this->label ); ?>
            </span>

            <?php if($this->description){ ?>
                <span class="description customize-control-description">
                <?php echo wp_kses_post($this->description); ?>
                </span>
            <?php } ?>

            <div class="gallery-screenshot clearfix">
            <?php
                {
                $ids = explode( ',', $this->value() );
                    foreach ( $ids as $attachment_id ) {
                        $img = wp_get_attachment_image_src( $attachment_id, 'thumbnail' );
                        echo '<div class="screen-thumb"><img src="' . esc_url( $img[0] ) . '" /></div>';
                    }
                }
            ?>
            </div>

            <input id="edit-gallery" class="button upload_gallery_button" type="button" value="<?php esc_html_e('Add/Edit Gallery','kingcabs') ?>" />
            <input id="clear-gallery" class="button upload_gallery_button" type="button" value="<?php esc_html_e('Clear','kingcabs') ?>" />
            <input type="hidden" class="gallery_values" <?php echo esc_url( $this->link() ); ?> value="<?php echo esc_attr( $this->value() ); ?>">
        </label>
        <?php }
    }

    /**
     * Select Multipe Item in Checkbox
    */
    class Kingcabs_Dropdown_Multiple_Chooser extends WP_Customize_Control{
        public $type = 'dropdown_multiple_chooser';
        public $placeholder = '';

        public function __construct($manager, $id, $args = array()){

            parent::__construct( $manager, $id, $args );
        }

        public function render_content(){
            if ( empty( $this->choices ) )
                    return;
            ?>
                <label>
                    <span class="customize-control-title">
                        <?php echo esc_html( $this->label ); ?>
                    </span>

                    <?php if($this->description){ ?>
                        <span class="description customize-control-description">
                        <?php echo wp_kses_post($this->description); ?>
                        </span>
                    <?php } ?>
                    <select multiple="multiple" class="hs-chosen-select" <?php $this->link(); ?>>
                        <?php
                        foreach ( $this->choices as $value => $label ){
                            $selected = '';
                            if(in_array($value, $this->value())){
                                $selected = 'selected="selected"';
                            }
                            echo '<option value="' . esc_attr( $value ) . '"' . esc_attr( $selected ) . '>' . esc_html($label) . '</option>';
                        }
                        ?>
                    </select>
                </label>
            <?php
        }
    }


    /**
     * Class HB_Charity_Theme_Customize_Dropdown_Taxonomies_Control
     */
    class Kingcabs_Theme_Customize_Dropdown_Taxonomies_Control extends WP_Customize_Control {

      public $type = 'dropdown-taxonomies';

      public $taxonomy = '';


      public function __construct( $manager, $id, $args = array() ) {

        $our_taxonomy = 'category';
        if ( isset( $args['taxonomy'] ) ) {
          $taxonomy_exist = taxonomy_exists( esc_attr( $args['taxonomy'] ) );
          if ( true === $taxonomy_exist ) {
            $our_taxonomy = esc_attr( $args['taxonomy'] );
          }
        }
        $args['taxonomy'] = $our_taxonomy;
        $this->taxonomy = esc_attr( $our_taxonomy );

        parent::__construct( $manager, $id, $args );
      }

      public function render_content() {

        $tax_args = array(
          'hierarchical' => 0,
          'taxonomy'     => $this->taxonomy,
        );
        $all_taxonomies = get_categories( $tax_args );

        ?>
        <label>
          <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
             <select <?php echo esc_url( $this->link() ); ?>>
                <?php
                  printf('<option value="%1$s" %2$s>%3$s</option>', '', selected($this->value(), '', false), esc_html__('Select', 'kingcabs') );
                 ?>
                <?php if ( ! empty( $all_taxonomies ) ): ?>
                  <?php foreach ( $all_taxonomies as $key => $tax ): ?>
                    <?php
                      printf('<option value="%1$s" %2$s>%3$s</option>', esc_attr( $tax->term_id ), selected($this->value(), esc_attr( $tax->term_id ), false), esc_html( $tax->name ) );
                     ?>
                  <?php endforeach ?>
               <?php endif ?>
             </select>

        </label>
        <?php
      }
    }

    /**
     * Heading Contrller
    */
    class Kingcabs_Customize_Heading extends WP_Customize_Control {
        public $type = 'heading';

        public function render_content() {
            if ( !empty( $this->label ) ) : ?>
                <h3 class="Kingcabs-accordion-section-title"><?php echo esc_html( $this->label ); ?></h3>
            <?php endif;

            if($this->description){ ?>
                <span class="description customize-control-description">
                <?php echo wp_kses_post($this->description); ?>
                </span>
            <?php }
        }
    }

    /**
     * Font Awesome List in Customizer
    */
    class Kingcabs_Fontawesome_Icon_Chooser extends WP_Customize_Control{
        public $type = 'icon';

        public function render_content(){
            ?>
                <label>
                    <span class="customize-control-title">
                    <?php echo esc_html( $this->label ); ?>
                    </span>

                    <?php if($this->description){ ?>
                    <span class="description customize-control-description">
                        <?php echo wp_kses_post($this->description); ?>
                    </span>
                    <?php } ?>

                    <div class="kingcabs-selected-icon">
                        <i class="fa <?php echo esc_attr($this->value()); ?>"></i>
                        <span><i class="fa fa-angle-down"></i></span>
                    </div>

                    <ul class="kingcabs-icon-list clearfix">
                        <?php
                        $kingcabs_font_awesome_icon_array = kingcabs_font_awesome_icon_array();
                        foreach ($kingcabs_font_awesome_icon_array as $kingcabs_font_awesome_icon) {
                                $icon_class = $this->value() == $kingcabs_font_awesome_icon ? 'icon-active' : '';
                                echo '<li class='.esc_attr( $icon_class ).'><i class="'.esc_attr( $kingcabs_font_awesome_icon ) .'"></i></li>';
                            }
                        ?>
                    </ul>
                    <input type="hidden" value="<?php $this->value(); ?>" <?php $this->link(); ?> />
                </label>
            <?php
        }
    }

    /**
     * Switch Contrller
    */
    class Kingcabs_Switch_Control extends WP_Customize_Control{
        public $type = 'switch';
        public $on_off_label = array();

        public function __construct($manager, $id, $args = array() ){
            $this->on_off_label = $args['on_off_label'];
            parent::__construct( $manager, $id, $args );
        }

        public function render_content(){
        ?>
            <span class="customize-control-title">
                <?php echo esc_html( $this->label ); ?>
            </span>

            <?php if($this->description){ ?>
                <span class="description customize-control-description">
                <?php echo wp_kses_post($this->description); ?>
                </span>
            <?php } ?>

            <?php
                $switch_class = ($this->value() == 'on') ? 'switch-on' : '';
                $on_off_label = $this->on_off_label;
            ?>
            <div class="onoffswitch <?php echo esc_attr( $switch_class ); ?>">
                <div class="onoffswitch-inner">
                    <div class="onoffswitch-active">
                        <div class="onoffswitch-switch"><?php echo esc_html($on_off_label['on']) ?></div>
                    </div>

                    <div class="onoffswitch-inactive">
                        <div class="onoffswitch-switch"><?php echo esc_html($on_off_label['off']) ?></div>
                    </div>
                </div>  
            </div>
            <input <?php $this->link(); ?> type="hidden" value="<?php echo esc_attr($this->value()); ?>"/>
            <?php
        }
    }

    /**
     * Multiple checkbox customize control class.
     */
    class Kingcabs_Customize_Control_Checkbox_Multiple extends WP_Customize_Control {

        /**
         * The type of customize control being rendered.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $type = 'checkbox-multiple';

        /**
         * Displays the control content.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function render_content() {

            if ( empty( $this->choices ) )
                return; ?>

            <?php if ( !empty( $this->label ) ) : ?>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <?php endif; ?>

            <?php if ( !empty( $this->description ) ) : ?>
                <span class="description customize-control-description"><?php echo esc_attr( $this->description ); ?></span>
            <?php endif; ?>

            <?php $multi_values = !is_array( $this->value() ) ? explode( ',', $this->value() ) : $this->value(); ?>

            <ul>
                <?php foreach ( $this->choices as $value => $label ) : ?>

                    <li>
                        <label>
                            <input type="checkbox" value="<?php echo esc_attr( $value ); ?>" <?php checked( in_array( $value, $multi_values ) ); ?> /> 
                            <?php echo esc_html( $label ); ?>
                        </label>
                    </li>

                <?php endforeach; ?>
            </ul>

            <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr( implode( ',', $multi_values ) ); ?>" />
        <?php }
    }
}