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
define( 'DB_NAME', 'cloth_store' );

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
define( 'AUTH_KEY',         'd`GU_u3IQsW{J4p1Sw>4ElS|#<r4=Jn&2(*iuvV^^L)fX;-(~oa0J`34ioLyQBnK' );
define( 'SECURE_AUTH_KEY',  'llg_&vwWX+8p3hz;,[@n5ajd/J>Y[5+z-_^c6p5>5&ZnU]n#26V^B$$bBlgcAy0=' );
define( 'LOGGED_IN_KEY',    'c+q7>h/?upinc#x7@$.6Kq2{B1Xdhpif[AiyAerAGF8<WG8V80xes$Sj5o_&`o$s' );
define( 'NONCE_KEY',        'IX`lAGU9!~~z0>%FMWP6d+X@7G=p/qx_W?U?exFagBEPMGZs+,cxNTj kmXuoIfx' );
define( 'AUTH_SALT',        'iCUz5>,aW-Ww.w1t#]H-m/Sk]i.K),F][*`du*WD9.2F^MI5s(c;.=bq3MfNU3OP' );
define( 'SECURE_AUTH_SALT', '%q<TBN,+1cMxOpd~dnE(zKE9[,[Q>FS-!;GOuqqiE]J}RgM@`d+v@(hEI]vV$8Hb' );
define( 'LOGGED_IN_SALT',   '~4?MV5Hsd6sk6VX:E8wuY$?0F<h D$it`V4rXSV%v0MdP|AsuP ]>+wL/0[:}3gY' );
define( 'NONCE_SALT',       '=LVvgcP-l+fIYy g/H(<$L!4P%pTs7>:L-O!1pac5!Y`miB`I>~)N,*J9[`$kL{w' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'cloth_';

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
