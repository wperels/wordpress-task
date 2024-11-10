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
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',          '`vk_n~K0L%l=~W_xh}_ujdV1bI!M|=tv-Ev6s,&e2.U,UM^|EGg^Kx8l$G9ecJlP' );
define( 'SECURE_AUTH_KEY',   '0$U*o-p>,t{[zaK]7#6bv)!$<<@p1vkv1& m6fDic4P>JCkA$GejcR<j}3LG,yKs' );
define( 'LOGGED_IN_KEY',     '[=}s!$&-t@v5dKWNNL9|nWo*R5<~P ZR Tj.>J6V;enS;ci@j/M|Z>zke&ZM_YO#' );
define( 'NONCE_KEY',         'yIWfK<z_u|3N+@S!~$+f){R@i+tIh*kI[<TD4/}H<l!Eq&s)Xjk]>6eh0N/Bl&]k' );
define( 'AUTH_SALT',         ']qqxE=N*!1w[>L@/Pp]ri?rbGeBK[;~7lOULv% c9A5u ssa)`]Z4Z0ROd^LXTeX' );
define( 'SECURE_AUTH_SALT',  'wEO/j3tse_J^gUOl>s=wzU+yx^,hpp4gS:utzsl6NHNL-D;e-9H)_#Evk7w6rbdb' );
define( 'LOGGED_IN_SALT',    'It00 E-}:ThY)rQQ?}HXQe.Hu N4Q}l: D_JJgxMA@xQGQ%MrYgD0Q`u5r_}mH(&' );
define( 'NONCE_SALT',        'do5SlK/X.3J0a=-vj`vo4=a(`D~fJ$+K?nLXMA)Z4gy Ex !V}Tp),Kas&mE5pY{' );
define( 'WP_CACHE_KEY_SALT', 'fSm;4FjmItv}##cU#t4GCd$(Z# I3/oi<!( `A)B~j<dZs24*-s|ZJDi F/~mRHQ' );


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
