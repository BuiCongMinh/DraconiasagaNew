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
define( 'DB_NAME', 'news' );

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
define( 'AUTH_KEY',         '`u4kT,Fc%S(&GDGN6B]_GRlB1tc}&4=Us?bmpA2E~mo-a*$4*SRm.2%j8h{kx:!b' );
define( 'SECURE_AUTH_KEY',  '5[rPK@a97,(AqdQD?eQ#peE,>G*.Je>^x^?do1`a2_%8Bj=H0&OL_dV7fPE&4E7K' );
define( 'LOGGED_IN_KEY',    'aF04hK/2m<s|C5r])2Fn{4Xc:6p9l|UTG}w*; OO3GLgg^qs]`,C;pRZzUyjRykm' );
define( 'NONCE_KEY',        'V}#A5)OsG`V5RIcgAY&N7Lz{sI1Ouv kCgq!.gYY9 `#/CI}#TWXmp9b-]$J^PK&' );
define( 'AUTH_SALT',        'sw1!f0qMPnV?sIvf|vFMv[Mt;Njy9{Bz90}obF${R/b&YUTRp#g2<7a^I9=g._Ez' );
define( 'SECURE_AUTH_SALT', '.-ifJ5)[wN}~*2P1,[T_OUw2L~eL6[R- O2&}}24,0H4b.)+2)oJxKNwtwCXyT};' );
define( 'LOGGED_IN_SALT',   ':BVx,2ZF>Jq.Bjoj*ef`Sg0?b<)k6>#CC$F&mi?[@1&MV?9w_zbS4u%+=t0wzAE!' );
define( 'NONCE_SALT',       'PQNbLuR3Y`<EcRd40:3<tYAAMzjaeM}646rU}UA+}!0jB=ou>8l]Fm.FY^#t:O%d' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
