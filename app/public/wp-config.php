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
define( 'AUTH_KEY',          'n:P8c86dMw}7_269AKTo4zB#4qB}VyEZw=2<(K7Jd3Whn`7:Q5q<.h%+~L$P2.Hw' );
define( 'SECURE_AUTH_KEY',   'U}.0V~)S^BA=4tg,8=($P<rAGs;0t4=Bf-GG5]AYy(6&M/<:{X0z6U m<bT<|=lW' );
define( 'LOGGED_IN_KEY',     'h_H*[bw8}3[_jib*9dhggY$of|Pg1agrZAw<8V0UGz6So0-L;D;emaRnj%Vg$|bX' );
define( 'NONCE_KEY',         '9>}wg470vP)/IX{Q*,|[quNjH4{ao7)rQ3S#3v]3Nbo[4]pRt7|?07d/In^o)BR$' );
define( 'AUTH_SALT',         'ydlcA8HV$)z*X5+/(UgS;|(taGhaIfoct`$62$dq9(E<L#U+uZRnZ6J<;U~OGg5B' );
define( 'SECURE_AUTH_SALT',  '}lw;0+5J./69.?<uVcY89q?I8wlfp+x_C3Poh?<}cW+XJMT.]{[z/tYVNxr-Ch0:' );
define( 'LOGGED_IN_SALT',    'UN&IG6S|b9nPhQamH4Df4A9mR+!v{-K1)<)]dXtE]un<A9F,&i].`V!ZK!qx7<oZ' );
define( 'NONCE_SALT',        '?>(A(:P`x5>|uj+u;85E7u r0ld 5[hz+%30sgdyZ9gM*Kg3A*C.j3N^IzTN7AD{' );
define( 'WP_CACHE_KEY_SALT', 'uArQ585<S@3XJiPA_LHkb4TB(d{e.( i#;%|9s;48S{J,ArY%/i*lT6w5fl/bE>`' );


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
