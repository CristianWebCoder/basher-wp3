<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db_basher_wp' );

define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '' );
define( 'DB_HOST', 'localhost' );
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
define( 'AUTH_KEY',         'I.^r}-To4HqW0*~DM2?2c$UNX7%IsRBy|lWcKubK&7GI[:_cX1hk(BSv6*6S:?Zj' );
define( 'SECURE_AUTH_KEY',  '!sLci:~;0ZA5O*#8:n2}T&,C/03{+_MT&we{8mc[9#Mjkv}dBKb|_+bJN6S o,(l' );
define( 'LOGGED_IN_KEY',    'er}-MmOh:W-j]qCc|vDo0LRdf6.+{ ) P_2}a,?6V@t2liz{ Vq 5vCd9SNIP^t,' );
define( 'NONCE_KEY',        'M88bcz+s`X^N$qoH6JR7`xfJ,Ora3u2+8ij]V=E<&Xn*Lpoeyd!9|6$FXq+N67I0' );
define( 'AUTH_SALT',        'wVGjKdWI!6#.]|wx?>LfO7lnXtO`+Q~:DowiuZ2[nn$Ho.%]XTvsFW/;+]G~3m5L' );
define( 'SECURE_AUTH_SALT', '&4C|$%,*k_i=kSqqZii.HQ9_Xfp+67Jha1-Jn#H#uZc0b`)Lg+:joFOvJB4[xc>d' );
define( 'LOGGED_IN_SALT',   ']+-QHo,O.*n&w r-Qq`qWve_?s0oP}QriJdJXp!gylgP-BP>08m^5_T,*t3;iaXh' );
define( 'NONCE_SALT',       'p0p;RbW:#H~@88`!7#IEw5 E1gK^ uMrv$;{:7&b+T*dFqS%nm|,bX_/AEt2/V:#' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
