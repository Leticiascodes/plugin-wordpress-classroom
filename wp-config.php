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
define( 'DB_NAME', 'bsi' );

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
define( 'AUTH_KEY',         '`Bm&50PJv;$l4i,?h)b*Wg~Ve@G}.^FHEqPFOC;ou4]UJ*xNKaw~fDHw2G}?_u%E' );
define( 'SECURE_AUTH_KEY',  '.wU!8&cS(kuH3Z [B0`c?Eyc[e?Xa}79D/o0ju<]yn<bE~[W/jRz6Mo*V:R/*r#W' );
define( 'LOGGED_IN_KEY',    '!?3G5j407%+^5P6v19<_2T*y+@`Sm*7EldhIxU( `Totdh+S%Yj&&C<-oZ7B<t|:' );
define( 'NONCE_KEY',        '^=CNdjm(Ph@gk,yyMCIl</tE`y?!N#WvfzWXCc5zu^i&xyLdK]$y0R)6t[6>mk!s' );
define( 'AUTH_SALT',        '#&LE1?_,]O(]{W0g4h4_(#x(a_imguH8%:{bO;|>Y.T,6%I;8yE&pQ)7`~4~kI,*' );
define( 'SECURE_AUTH_SALT', '(}6Hnq_[Ydr|#)A`l7#a]&u+ixrIlN&c2HSULO|GC`FsNQW2^P5+-):N|+?p;KGU' );
define( 'LOGGED_IN_SALT',   'Kl0tl.JWQ?ZcZ@mEB{VrP_QY**0A;g32AOzqiG&ih4!OP$it=oaAD{ke(aSUD]PD' );
define( 'NONCE_SALT',       'W%Q+OztqSbqH=TYK:UHb:`wC%cAw+2?!R1p9]6h|qY!Y)xJejt&(spSYmZ>BMja3' );

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
