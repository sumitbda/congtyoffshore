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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'congtyoffshore' );

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
define( 'AUTH_KEY',         '(oH` &`xm;E[Ok_iZB(OgD0(5[c}+*mp[[}w`kc+K/tI`/pSCuK5Sz`j#<wkI4}x' );
define( 'SECURE_AUTH_KEY',  '.RQ^3l6fA%;&wzl#0+[8(#{9?o<a9i9)qL<&5P-gS0@I_1?Nj=5=K:,!V1r}j~wg' );
define( 'LOGGED_IN_KEY',    'iD3Ghl{>BMW(@4T.?CAUA/MYDUG;{8Y`a?.G,RfztpF42Rt-^]?urx0r=N6+((8-' );
define( 'NONCE_KEY',        '34cnl/x,(V>r:[z7+>l8O|oY3p*bLa|C}YV ,}&BE$jqpx^X}9g2,$e#4YBED}GF' );
define( 'AUTH_SALT',        '..<[e)sNPOgE@,+Icv*n<(V.]i!!E,9R=}-ib-@3p)d0=^B(o=!6~{=,pV1A~yLc' );
define( 'SECURE_AUTH_SALT', '5n|Wj/o>2Rw&&/gy;i8r;|SKU]kWuYOp[_{A)J;vuv,0r$1@*-+b/~o6t[&Uf^@>' );
define( 'LOGGED_IN_SALT',   'hS.Kn?z@0oa)p8%RO(E})qK$wOa~bO5QNhn$Dca+ ;.P2P[^d~@}UhG$g:<uZjT@' );
define( 'NONCE_SALT',       'E]&{<W8vh|@pAf08Mluqqqu0(v:``qG-VZ~Kju`V(UTb_YnZ/ h*,#q9%=>=T7> ' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'bda_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );

