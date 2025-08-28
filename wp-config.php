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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */

define( 'DB_NAME', getenv('MYSQL_DATABASE') );
define( 'DB_USER', getenv('MYSQL_USER') );
define( 'DB_PASSWORD', getenv('MYSQL_PASSWORD') );
define( 'DB_HOST', 'db' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '~R!sRi@.K7.tpIdlQ}x`WV9l,U=/Z_IK?2P|z*i9Me8Q7`h)+BHh+M}xj[H=z-WZ' );
define( 'SECURE_AUTH_KEY',   '0P|~!^yQ`nL|KJU~O!_wCV=`dpUwZ,nETi91:/?1=B >(hN_:W]sAe%)Bw_G75FW' );
define( 'LOGGED_IN_KEY',     'jVSAJXb.f?-+Eirk#?FCeP[.C:rAye1GxW/)E`t]ov;;T7P@&MIx(MzvG_)D?CiA' );
define( 'NONCE_KEY',         'l6+<H8SBH&-0h`UjJ@(402d?d6*4]&DM@`O9IkhqFFX]1y]Y#0fncC.yPKZT|~yL' );
define( 'AUTH_SALT',         '#)O67sJY>q^#]k94DW,vdG1EKO;O@- pZ`Gg-OD;F/p:xY;E]>2Zrw^Yqinnc4%l' );
define( 'SECURE_AUTH_SALT',  'yM<u s):!mGBSu+z(Q*u4Y9UU^~+3!>=4}N=pyHf?XE,9i[zfx*YOe|:IBkU7Fpx' );
define( 'LOGGED_IN_SALT',    'GpB/?q $YjF:]I5k@[}q4okRE!Kk`s*{Uel%6wyA{Hi/;pbfHo?)YzJ0)mF+=#MR' );
define( 'NONCE_SALT',        ',RxR*qnv4~LGYYzf+sZ6u(7N(Z{ OJ1oK)k[R`,[:gkik^ mTy?99^I^sf.W8F}E' );
define( 'WP_CACHE_KEY_SALT', '>.(_d=*w59#dWedmdn^!itGN~fk1].}5JH.5}{n8/b2<,1Txz/e ?w@bi{=khR}V' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
