<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'viajes' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'uGpT6P*C3E}a!^NtZu!6vWY!m3=z@-SC4fx$/774K^:XvRTe)qcwx:I5]}xM2gI&' );
define( 'SECURE_AUTH_KEY',  'DI<<%w0+( C$yo1K0l~HzHWmv4B/ diECt$|g9k(E]3TdGD*7NJoI3f43L@{bb1K' );
define( 'LOGGED_IN_KEY',    'F-s92{0F!>TSz*!DXD,^KUb4yZ9twF,5mM#2U7PZ%My6Z!}o:T2{~VX>KgPr281Y' );
define( 'NONCE_KEY',        'Y.5(c~ a{pm3|AZ8,<?+]OPO422/2<SHN3p%WX5%A1D#&?NVhqap}.MMOFiQ`UmZ' );
define( 'AUTH_SALT',        '^pm4.)#)LK]n/;uj}{CgjLi:0j.E4v2)-mEd>BA) ^R`1V589]F&*MV+M:FZlDwN' );
define( 'SECURE_AUTH_SALT', '$bKBm~05h0>@>wPxK$vT|g(!UI9g`td4PR;aXs|4lsrU^ioO?#Vk!G^H!<Ze/V%5' );
define( 'LOGGED_IN_SALT',   'tk@$sHj_17k9Zd~a%2r*BbJ1]]7{+Vd/Whr6j1Yqo#&=YI[SL}pj!wR|RoOJAyWc' );
define( 'NONCE_SALT',       'GqLHt2S>#{TbpC*%^_]%kN#+([:GHboYLK|H=4=|pEiZQ.+`><cS27+D;r*Ee)7z' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
