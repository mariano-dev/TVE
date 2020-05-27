<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package King_Cabs
 */
$post_sidebar = esc_attr( get_post_meta($post->ID, 'kingcabs_page_layouts', true) );

	if( empty($post_sidebar) ) {
		$post_sidebar = 'rightsidebar';
	}

	if ( $post_sidebar ==  'nosidebar' ) {
		return;
	}
	
if( $post_sidebar == 'rightsidebar' && is_active_sidebar('sidebar-1')){ ?>
	<div class="col-md-3 col-sm-4 widget-area">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
	<?php
}

if( $post_sidebar == 'leftsidebar' && is_active_sidebar('sidebar-2')){ ?>
	<div class="col-md-3 col-sm-4 widget-area">
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</div>
	<?php
}