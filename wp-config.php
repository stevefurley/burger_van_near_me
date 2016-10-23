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
define('DB_NAME', 'c9');

/** MySQL database username */
define('DB_USER', 'stevesnow1');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'w/=e8-mSOgmTaQ;1[aRF=-N%~`u;~%CHQ!]9(&r[.f  CQ G(K#x_S_nQl&v>_MF');
define('SECURE_AUTH_KEY',  'i]%|EitBlM?K|D?n,D$]m>Av%{GYew@-^>F4Q(Zz6n.hTSSLzODAI^<4[1*`(BIe');
define('LOGGED_IN_KEY',    'CfusN*T*#YWr)+2+p[zqnIP-{?ZYw1i2R(ht8Y7Dq+,R60ACQsygwWh_hZDc>R`-');
define('NONCE_KEY',        '4st:b~26%lOP9+})kVBJfL_Nn8Wv(]EeZY;>cpg=?L6Sb9,?o]/_Wdu5E*)j%kB}');
define('AUTH_SALT',        'V)w;XViy4oE,nyE}zZ`su-zf<gYl )g&Pk&}O/tyZn&KjmLt&R@![ly#Q3O`d$3B');
define('SECURE_AUTH_SALT', 'p5y]ig~V4O.oQvv_(Kj]s9<.Kr,Do$ QTY?$P`;x7S^=(99mpb85o4xAE-cM|A5G');
define('LOGGED_IN_SALT',   ',3*ERO Puk1|h,kbUyLzmf^JU#G5c]>s[~98<jS^)={Z3y`][)j,1BP}DpTxXIn|');
define('NONCE_SALT',       'W+v3aJ2wyA{$1Gn=xe5d*GDI#d>CX|K?@k%0ztzT]sK.VmG`ssA=HmPPbtp;|S?*');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
