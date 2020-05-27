<?php
/**
 * Travelia functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Travelia
 */

if ( ! function_exists( 'travelia_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function travelia_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Travelia, use a find and replace
		 * to change 'travelia' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'travelia', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'travelia' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'travelia_custom_background_args', array(
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
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'travelia_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function travelia_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'travelia_content_width', 640 );
}
add_action( 'after_setup_theme', 'travelia_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function travelia_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 1', 'travelia' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'travelia' ),
		'before_widget' => '<div id="%1$s" class="single-widget about %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 2', 'travelia' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'travelia' ),
		'before_widget' => '<div id="%1$s" class="single-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 3', 'travelia' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'travelia' ),
		'before_widget' => '<div id="%1$s" class="single-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 4', 'travelia' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'travelia' ),
		'before_widget' => '<div id="%1$s" class="single-widget contact-info %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Google map iframe', 'travelia' ),
		'id'            => 'google-map',
		'description'   => __( 'Add widgets here.', 'travelia' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'travelia_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 *  Partials for Selective Refresh Customizer
 */
require get_template_directory() . '/inc/customizer/customizer-partials-function.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';


/**
* Bootstrap Navwalker
*/
require get_template_directory() . '/inc/wp-bootstrap-navwalker.php';


/**
 * Breadcrumbs Trail
 */
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Check if Wp Travel Engine Plugin is installed
*/
function travelia_is_wpte_activated(){
	return class_exists( 'Wp_Travel_Engine' ) ? true : false;
}


if( ! function_exists( 'travelia_get_trip_currency' ) ) :
/**
 * Get currency for WP Travel Engine Trip
*/
function travelia_get_trip_currency(){
	$currency = '';
	if( travelia_is_wpte_activated() ){
		$wpte_setting = get_option( 'wp_travel_engine_settings', true ); 
		$code = 'USD';
		if( isset( $wpte_setting['currency_code'] ) && $wpte_setting['currency_code']!= '' ){
			$code = $wpte_setting['currency_code'];
		} 
		$obj = new Wp_Travel_Engine_Functions();
		$currency = $obj->wp_travel_engine_currencies_symbol( $code );
	}
	return $currency;
}
endif;

if ( is_admin() ) {
	// Load about.
	
	require_once trailingslashit( get_template_directory() ) . 'inc/theme-info/class-about.php';
	require_once trailingslashit( get_template_directory() ) . 'inc/theme-info/about.php';
}

/*
* Function to list post categories in customizer options
*/
function travelia_get_categories( $select = true, $taxonomy = 'category', $slug = false ){
	
	/* Option list of all categories */
	$categories = array();
	if( $select ) $categories[''] = __( 'Choose Category', 'travelia' );
	
	if( taxonomy_exists( $taxonomy ) ){
		$args = array( 
			'hide_empty' => false,
			'taxonomy'   => $taxonomy 
		);
		
		$catlists = get_terms( $args );
		
		foreach( $catlists as $category ){
			if( $slug ){
				$categories[$category->slug] = $category->name;
			}else{
				$categories[$category->term_id] = $category->name;    
			}        
		}
	}
	return $categories;
}

function travelia_check_wp_engine_plugin_activation()
{
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	return is_plugin_active( 'wp-travel-engine/wp-travel-engine.php' );
}

if( ! function_exists( 'travelia_get_trip_currency' ) ) :
/**
 * Get currency for WP Travel Engine Trip
*/
function travelia_get_trip_currency(){
	$currency = '';
	if( travel_company_is_wpte_activated() ){
		$wpte_setting = get_option( 'wp_travel_engine_settings', true ); 
		$code = 'USD';
		if( isset( $wpte_setting['currency_code'] ) && $wpte_setting['currency_code']!= '' ){
			$code = $wpte_setting['currency_code'];
		} 
		$obj = new Wp_Travel_Engine_Functions();
		$currency = $obj->wp_travel_engine_currencies_symbol( $code );
	}
	return $currency;
}
endif;

function travelia_bs_pagination($pages = '', $range = 4)
{  
	$showitems = ($range * 2) + 1;  
	$paged = get_query_var( 'paged');

	if(empty($paged)) $paged = 1;
	if($pages == '')
	{
		global $wp_query; 
		$pages = $wp_query->max_num_pages;
		if(!$pages)
		{
			$pages = 1;
		}
	}   

	if(1 != $pages)
	{
		echo '<ul class="pagination-list">';
		for ($i=1; $i <= $pages; $i++)
		{
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			{
				echo ($paged == $i)? "<li class=\"page-item active\"><a href='".esc_url(get_pagenum_link($i))."' class='page-link'>".esc_html($i)."</a></li>":"<li class='page-item'><a href='".esc_url(get_pagenum_link($i))."' class='page-link'>".esc_html($i)."</a></li>";
			}
		}

		if ($paged < $pages ) echo "<li class='page-item next'><a href=\"".esc_url(get_pagenum_link($paged + 1))."\" class='page-link'>".esc_html__('Next Page','travelia')."</a></li>";  
		echo "</ul>";
	}
}
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}





add_action("wp_enqueue_scripts", "insert_js");

function insert_js(){
    
    wp_register_script('myScript', get_stylesheet_directory_uri(). '/js/script.js', array('jquery'), '1', true );
    wp_enqueue_script('myScript');

    wp_localize_script('myScript','script_vars',['ajaxurl'=>admin_url('admin-ajax.php')]);

    wp_localize_script('myScript','send_contact',['ajaxurl'=>admin_url('admin-ajax.php')]);
    
}

add_action( 'wp_enqueue_scripts', 'custom_enqueue_styles');

function custom_enqueue_styles() {
	wp_enqueue_style( 'custom-style', 
					  get_stylesheet_directory_uri() . '/css/css-loader.css', 
					  array(), 
					  wp_get_theme()->get('Version')
					);
}


//Devolver datos a archivo js
add_action('wp_ajax_nopriv_ajax_test','enviar_contenido');
add_action('wp_ajax_ajax_test','enviar_contenido');

add_action('wp_ajax_nopriv_ajax_contact_test','enviar_contacto');
add_action('wp_ajax_ajax_contact_test','enviar_contacto');

function enviar_contacto() {

    
  $name = $_POST['dataContactName'];
  $phone = $_POST['dataContactPhone'];
  $email = $_POST['dataContactEmail'];
  $msg = $_POST['dataContactMsg'];
  $enlace = "https://wa.me/{$phone}";
  $link = "<a href='{$enlace}'>Click aqui</a>";

  $to = 'info@tve.com.ar';
  
  $subject = 'TVE > Nuevo mensaje de contacto de : '.$name;


  $message =  '<a style="color:black"><strong>NUEVO MENSAJE DESDE PAGINA CONTACTO </strong></a><br><br>';
  $message .= '<a style="color:red"><strong>- NOMBRE: </strong></a><strong>'.$name.'</strong><br>';
  $message .= '<a style="color:red"><strong>- TELEFONO: </strong></a><strong>'.$phone.'</strong><br>';
  $message .= '<a style="color:red"><strong>- EMAIL: </strong></a><strong>'.$email.'</strong><br>';
  $message .= '<a style="color:#19981b"><strong>- Puedes iniciar una conversacion de WhatsApp utilizando el siguiente enlance: </strong></a><strong>'.$link.'</strong><br><hr>';
  $message .= '<a style="color:red"><strong>- MENSAJE:<br></strong></a><strong>'.$msg.'</strong><br>';
  

  


  // $message = '<a style="color:black"><h3></h3><strong>NUEVA RESERVA DE VIAJE </strong></h3></a><br><br>';
  // $message .= '<a style="color:red"><strong>- EL ORIGEN ES: </strong></a><strong>'.$mailStart.'</strong><br>';
  // $message .= '<a style="color:red"><strong>- EL DESTINO ES: </strong></a><strong>'.$mailEnd.'</strong><br>';
  // $message .= '<a style="color:red"><strong>- LA DISTANCIA TOTAL ES: </strong></a><strong>'.$distance.'</strong><br>';
  // $message .= '<a style="color:red"><strong>- EL COSTO DEL VIAJE ES: </strong></a><strong>'.$price.'</strong><br><hr>';
  // $message .= '<a style="color:black"><strong>DETALLES DE CONTACTO: </strong></a><br><br>';
  // $message .= '<a style="color:red"><strong>- NOMBRE: </strong></a><strong>'.$mailName.'</strong><br>';
  // $message .= '<a style="color:red"><strong>- TELEFONO: </strong></a><strong>'.$phone.'</strong><br>';
  // $message .= '<a style="color:red"><strong>- EMAIL: </strong></a><strong>'.$email.'</strong><br>';
  // $message .= '<a style="color:red"><strong>- FECHA DE RESERVA: </strong></a><strong>'.$mailDate.' hs</strong><br>';
  // $message .= '<a style="color:red"><strong>- CANTIDAD DE PASAJEROS: </strong></a><strong>'.$passengers.'</strong><br><hr>';
  // $message .= '<a style="color:#19981b"><strong>- Puedes iniciar una conversacion de WhatsApp utilizando el siguiente enlance: </strong></a><strong>'.$link.'</strong><br>';





  $headers = array('Content-Type: text/html; charset=UTF-8');


  if( wp_mail( $to, $subject, $message, $headers ) ){
      echo "Mensaje enviado con exito";
  } else {
      echo "Hubo un error, porfavor intente nuevamente";
  }

  die(); // never forget to die() your AJAX reuqests

  wp_die();
}

function enviar_contenido() {
  
$cURLConnection = curl_init();

$mailName = $_POST['mailName'];
$mailStart = $_POST['mailStart'];
$mailEnd = $_POST['mailEnd'];
$mailDate = $_POST['mailDate'];

$name = $_POST['dataName'];
$phone = $_POST['dataPhone'];
$email = $_POST['dataEmail'];
$date = $_POST['dataDate'];
$passengers = $_POST['dataPassengers'];
$start = $_POST['dataStart'];
$end = $_POST['dataEnd'];
// $travelInfo = strip_tags($_POST['dataTravelInfo']);
$distance = strip_tags($_POST['dataDistance']);
$price = strip_tags($_POST['dataPrice']);
$cliente = "btob";
$clienteId = "dd7fa22f37834e6a";
// $phoneToSend = "3516519054";
$phoneToSend = "3516542769";
$enlace = "https://wa.me/{$phone}";

$msg = <<<TEXT
*Hola Operador! Se ha recibido una nueva solicitud de viaje*  ---  El ORIGEN es: *{$start}*  ---  El DESTINO es: *{$end}*  ---  La distancia total es: *{$distance}*  ---  El costo es: *{$price}*  ---  _*DETALLES DE CONTACTO*_    ---  NOMBRE: *{$name}*  ---  EMAIL: *{$email}*  ---  TELEFONO: *{$phone}*  ---  FECHA: *{$date}*  ---  PASAJEROS: *{$passengers}*  ---  _Puedes iniciar una conversacion de WhatsApp utilizando el siguiente enlance:_ {$enlace}
TEXT;

$urlParams = [
  'cliente' => $cliente,
  'ID' => $clienteId,
  'phoneToSend' => $phoneToSend,
  'text' => $msg
];

$mensajeDecoded = rawurlencode($msg);
$url = "http://200.68.91.81:8080/wgatewayJ.php?cliente={$cliente}&ID={$clienteId}&phone={$phoneToSend}&text={$mensajeDecoded}";

function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}
console_log($url);

curl_setopt($cURLConnection, CURLOPT_URL, $url);
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

$data = curl_exec($cURLConnection);

$responseCode = curl_getinfo($cURLConnection, CURLINFO_HTTP_CODE);

if (!$responseCode || $responseCode >= 400 ) { 

  $to = 'info@tve.com.ar';
  
  $subject = 'TVE > Nueva reserva de viaje de: '.$mailName;
  $link = "<a href='{$enlace}'>Click aqui</a>";
  


  $message = '<a style="color:black"><h3></h3><strong>NUEVA RESERVA DE VIAJE </strong></h3></a><br><br>';
  $message .= '<a style="color:red"><strong>> EL ORIGEN ES: </strong></a><strong>'.$mailStart.'</strong><br>';
  $message .= '<a style="color:red"><strong>> EL DESTINO ES: </strong></a><strong>'.$mailEnd.'</strong><br>';
  $message .= '<a style="color:red"><strong>> LA DISTANCIA TOTAL ES: </strong></a><strong>'.$distance.'</strong><br>';
  $message .= '<a style="color:red"><strong>> EL COSTO DEL VIAJE ES: </strong></a><strong>'.$price.'</strong><br><hr>';
  $message .= '<a style="color:black"><strong>DETALLES DE CONTACTO: </strong></a><br><br>';
  $message .= '<a style="color:red"><strong>> NOMBRE: </strong></a><strong>'.$mailName.'</strong><br>';
  $message .= '<a style="color:red"><strong>> TELEFONO: </strong></a><strong>'.$phone.'</strong><br>';
  $message .= '<a style="color:red"><strong>> EMAIL: </strong></a><strong>'.$email.'</strong><br>';
  $message .= '<a style="color:red"><strong>> FECHA DE VIAJE: </strong></a><strong>'.$mailDate.' hs</strong><br>';
  $message .= '<a style="color:red"><strong>> CANTIDAD DE PASAJEROS: </strong></a><strong>'.$passengers.'</strong><br><hr>';
  $message .= '<a style="color:#19981b"><strong>> Puedes iniciar una conversacion de WhatsApp utilizando el siguiente enlance: </strong></a><strong>'.$link.'</strong><br>';

  $headers = array('Content-Type: text/html; charset=UTF-8');


  if( wp_mail( $to, $subject, $message, $headers ) ){
      echo "Mensaje enviado con exito";
  } else {
      echo "Hubo un error, porfavor intente nuevamente";
  }

  die(); // never forget to die() your AJAX reuqests

  wp_die();

 }
curl_close($cURLConnection);

}