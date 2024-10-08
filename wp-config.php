<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'civicrm_wordpress' );

/** Database username */
define( 'DB_USER', 'DB_USER' );

/** Database password */
define( 'DB_PASSWORD', 'DB_PASSWORD' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'WB]m 5~;*v6V%), Kr_uMlY{}Z|Xj3np89pGPrTMjg!)nB7~eGDB /N+8qkXu#!$' );
define( 'SECURE_AUTH_KEY',  'UoZ8nDzHw9/u7XYpBm,INIn#C.9tU#4D/T`L3mz%`gs^|yQx7n6^4F5vQ{he+^Nr' );
define( 'LOGGED_IN_KEY',    'ONNz3Bn!;u7VE?@cn%X$TD[MF1Rbef7]@:sXEF.8.Vl`=,0!NXq@(ExMU:S&`0?!' );
define( 'NONCE_KEY',        '#Lu;Rh4fk=Z.Ju*/mk.3|UY][FjdD)}O7 /0Y:k_gIQ0@DGIZT()wydz|cZeBQ&3' );
define( 'AUTH_SALT',        '})=t8d$5UW(s5ZgqK--v#amwqEQr2Ca]|0983*2yhO45&xPq[LO.+sEVjm*{)v3J' );
define( 'SECURE_AUTH_SALT', '`lZ96#fm35^>$Z19^sR9E:/udAomuiKd98wQk`x@B2]Ff_VMy0B!K+?-K38cXSL,' );
define( 'LOGGED_IN_SALT',   '%2Z-7}x+%@{(Ka#Oz=#v.}`4}w,7*gt3]U]emTxTg~x#]-GgWOX5$uS<z/}TT&*V' );
define( 'NONCE_SALT',       ').X3(U>IFs4UHJ{#67(=odiLgn{>-Kn6}jVDp[Q,n9XW8 >WRp0MZLr`hLJ9zG}&' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
