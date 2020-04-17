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
define( 'DB_NAME', 'aluraintercambio' );

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
define( 'AUTH_KEY',         '_UjIsDNX5@76~N|Ikc 5vdijqRMqM?Y%}?FtJ$UIt}!8&4voD5Vr]LtlYC&aEB:p' );
define( 'SECURE_AUTH_KEY',  'eoZ3LWlY)Z yEy>#{&-_dny(R{^O;7S$G;{R;j<EvYj}4``@uMe9CS#E8Q{1HAk{' );
define( 'LOGGED_IN_KEY',    '*LPSI*|4x;Ix$?sK j|vVdV0~`?-:_XGh *H Hva6Ph8 b+YJ~Ra9NBW@2W*A3q6' );
define( 'NONCE_KEY',        'aKI.yWd3~OaFX{uEh]2C]D,OZxF]6%G9]us(5FUN,YoD-FVdsA498f[MDhz/Wk[ ' );
define( 'AUTH_SALT',        'B)I%w?hbabwfL5hDu2^]UILK@pU,1 |zo`?Ju$VKGF<w}.DoGtaUxuj@DGMDLLev' );
define( 'SECURE_AUTH_SALT', 'B:AZ)%6V_sM$47fU*Ud**J?MCqYUxeGsQ<5McNu{Boh3-<Usqi</nJ9<1yb{95q-' );
define( 'LOGGED_IN_SALT',   'qM2~j2KHYf&MX?|wuA:VBwC21qI~H~p^+GQ4b>I86b<MI0E(^ZZ0>NX$EWGs|fUI' );
define( 'NONCE_SALT',       'qd}am%TT0QH{so-L,6DW *09hDb`6.>(s6)}x<fD5E-Eo^:e c!UrH#JHUiM%{Z!' );

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
