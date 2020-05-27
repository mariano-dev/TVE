<?php
/**
 * King Cabs functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package King_Cabs
 */

if ( ! function_exists( 'kingcabs_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function kingcabs_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on King Cabs, use a find and replace
		 * to change 'kingcabs' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'kingcabs', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * This theme styles the visual editor to resemble the theme style.
		*/
		add_editor_style( array( 'assets/css/editor-style.css', kingcabs_fonts_url() ) );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * WooCommerce support.
		 */
		add_theme_support( 'woocommerce' );

		/*
		 * Add support for WooCommerce
		 */
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		//Advance Image Size Crop
		add_image_size('kingcabs-normal-image', 580, 375, true);
		add_image_size('kingcabs-team-image', 480, 480, true);
		add_image_size('kingcabs-large', 795, 385, true);
		add_image_size('kingcabs-slider', 1350, 600, true);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary Menu', 'kingcabs' ),
			'menu-2' => esc_html__( 'Top Menu', 'kingcabs' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'post-formats', array( 'aside' ) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'kingcabs_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 90,
			'width'       => 240,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'kingcabs_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kingcabs_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kingcabs_content_width', 640 );
}
add_action( 'after_setup_theme', 'kingcabs_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kingcabs_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar Widget Area', 'kingcabs' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'kingcabs' ),
		'before_widget' => '<aside id="%1$s" class="widget page-sidebar clearfix %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar Widget Area', 'kingcabs' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'kingcabs' ),
		'before_widget' => '<aside id="%1$s" class="widget page-sidebar clearfix %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );


	$kingcabs_description = esc_html__( 'Create a new page to display on front page ( Ex: Home ). Select A static page then Front page and Posts page to display front page specific sections. Note: Static page will be set automatically when you "Checked to Set Kingcabs frontpage?', 'kingcabs' );

	register_sidebar( array(
		'name'          => esc_html__( 'HomePage Widget Area', 'kingcabs' ),
		'id'            => 'homewidget-1',
		'description'   => $kingcabs_description,
		'before_widget' => '<aside id="%1$s" class="widget homewidget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '',
		'after_title'   => '',
	) );	

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area One', 'kingcabs' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'kingcabs' ),
		'before_widget' => '<aside id="%1$s" class="widget clearfix footer-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area Two', 'kingcabs' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'kingcabs' ),
		'before_widget' => '<aside id="%1$s" class="widget clearfix footer-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area Three', 'kingcabs' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'kingcabs' ),
		'before_widget' => '<aside id="%1$s" class="widget clearfix footer-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area Four', 'kingcabs' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'kingcabs' ),
		'before_widget' => '<aside id="%1$s" class="widget clearfix footer-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	

}
add_action( 'widgets_init', 'kingcabs_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kingcabs_scripts() {

	$kingcabs_theme = wp_get_theme('kingcabs');
	
	$theme_version = $kingcabs_theme->get( 'Version' );

	/**
	 * Kingcabs Theme Google Fonts
	*/
	$fonts_url = kingcabs_fonts_url();
	if ( ! empty( $fonts_url ) ) {
		wp_enqueue_style( 'kingcabs-fonts', $fonts_url, array(), null );
	}

    /**
     * Kingcabs Icon Font Awesome 
    */
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/library/font-awesome/css/font-awesome.min.css' );

    /**
     * Kingcabs Animate CSS 
    */
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/library/animate/animate.min.css' );
    
    /**
     * Kingcabs Lightslider CSS 
    */
    wp_enqueue_style( 'lightslider', get_template_directory_uri() . '/assets/library/lightslider/css/lightslider.min.css' );
    /**
     * Bootstrap jQuery File  
    */
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/library/bootstrap/css/bootstrap.min.css' );

    /**
     * Main Style CSS
    */
    wp_enqueue_style( 'kingcabs-style', get_stylesheet_uri() );

    /**
     * Responsive CSS
    */
    wp_enqueue_style( 'kingcabs-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );
       
   
    /* html5 js library */
    wp_enqueue_script('html5', get_template_directory_uri() . '/assets/library/html5shiv/html5shiv.min.js', array('jquery'), $theme_version, false);
    wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

    /* Respond js library */
    wp_enqueue_script('respond', get_template_directory_uri() . '/assets/library/respond/respond.min.js', array('jquery'), $theme_version, false);
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

	
	/**
	 * Bootstrap jQuery File  
	*/
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/library/bootstrap/js/bootstrap.min.js', array('jquery'), esc_attr( $theme_version ), true);

	/**
	 * Lightslider
	*/
	wp_enqueue_script('lightslider', get_template_directory_uri() . '/assets/library/lightslider/js/lightslider.min.js', array('jquery'), esc_attr( $theme_version ), true);

	/**
	 * Isotop PKGD 
	*/
	wp_enqueue_script('isotope-pkgd', get_template_directory_uri() . '/assets/library/isotope/isotope.pkgd.min.js', array('jquery'), esc_attr( $theme_version ), true);
	
	/**
	 * Counter jQuery
	*/	
	wp_enqueue_script( 'jquery-counterup', get_template_directory_uri() . '/assets/library/counterup/jquery.counterup.min.js', array(), esc_attr( $theme_version ), true );
	wp_enqueue_script('waypoints', get_template_directory_uri() . '/assets/library/waypoint/waypoints.min.js', array('jquery'), esc_attr( $theme_version ), true);

	wp_enqueue_script( 'kingcabs-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	/**
	 * King Cabs script
	*/

	wp_enqueue_script('kingcabs-custom', get_template_directory_uri() . '/assets/js/kingcabs-custom.js', array('jquery'), esc_attr( $theme_version ), false);

	$teamcolumn = get_theme_mod( 'kingcabs_driver_column', 3 );

	wp_localize_script( 'kingcabs-custom', 'kingcabs_ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php'), 'teamcolumn' => $teamcolumn ) );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kingcabs_scripts' );

 

/**
 * Admin Panle Enqueue Scripts and Styles
 */
if ( ! function_exists( 'kingcabs_media_scripts' ) ) {
    function kingcabs_media_scripts( $hook ) {

    if( $hook != 'edit.php' && $hook != 'post.php' && $hook != 'post-new.php' && 'widgets.php' != $hook ) 
		return;

		wp_enqueue_script('kingcabs-admin-script', get_template_directory_uri() . '/assets/js/kingcabs-admin.js', array('jquery') );
    	wp_enqueue_style( 'kingcabs-admin', get_template_directory_uri() .'/assets/css/kingcabs-admin.css');
    }
}
add_action('admin_enqueue_scripts', 'kingcabs_media_scripts');


/**
 * Kingcabs Theme Call Google Fonts
*/
if ( ! function_exists( 'kingcabs_fonts_url' ) ) :

	/**
	 * Return fonts URL.
	 *
	 * @since 1.0.0
	 * @return string Font URL.
	 */
	function kingcabs_fonts_url() {

		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Heebo, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Heebo font: on or off', 'kingcabs' ) ) {
			$fonts[] = 'Heebo:300,400,500,700,800,900';
		}

		/* translators: If there are characters in your language that are not supported by PT+Sans, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'PT+Sans font: on or off', 'kingcabs' ) ) {
			$fonts[] = 'PT Sans:400,400i,700,700i';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}

endif;


/**
 * Require init.
*/
require  trailingslashit( get_template_directory() ).'sparklethemes/init.php';

