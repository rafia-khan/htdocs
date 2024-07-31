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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'd +EOC6hgh)((4@fgw>jFQ,!JXYw!.S`SfYjirMP&%<qvo]eKn>x|06Pw-,yyl[B' );
define( 'SECURE_AUTH_KEY',  '/DXsDudz!=wSkKkTk^5m2{DjP>{ELAfza9Orq8/U]Cw$2d,LNjI)24[Tdl|gyP%)' );
define( 'LOGGED_IN_KEY',    ':I4+6o_nTdsSM c7qQ#wP^TN]KT& [/kf[hG1,~5As P?6o5H}bkE|DQx>:_]kLi' );
define( 'NONCE_KEY',        '}A!(Yv?G.&&wRoOHxpyUpQq;OD0Y9)k-j!hGdN^*rU&%}$1_HUC%kL>yA?tx1>}U' );
define( 'AUTH_SALT',        'o5$Db, y=zw3n0ihE^z&c_kQMT%Aec?xa7S,U.*h/CAbK1~a?]:_uI6wADJ_0KbB' );
define( 'SECURE_AUTH_SALT', '41m--4q3.E&GV)lDkS&AF:+!u`^S(4wIXM$C7.X`AI|oVlBr{<1obB=G@<h<7*Gx' );
define( 'LOGGED_IN_SALT',   '?2C6`o?I@e}%Dm=e~<KpZ;<GeaFlh$O^<:lPNoa4+`AMp1+P6Rkd.IJGfn>?_qY!' );
define( 'NONCE_SALT',       '-(yS][])NjR5m z1!qn}0l?^`R8`e&%7Y9>L K!z]0PVp+MH)|f;>k )8;+:es, ' );

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
