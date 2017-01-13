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
define('DB_NAME', 'atopiclair');

/** MySQL database username */
define('DB_USER', 'root');

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
define('AUTH_KEY',         'uz%Thg{7^T]T,j5q.=VY9 z$6_ndlTlCpW>uZ:zw8:drkl@B+qFHo~*5Q~K-$dIx');
define('SECURE_AUTH_KEY',  'z5YZGLuhbw#TIe:az0$!w2vO`YhJLk^|DzYYxC!7[Bnx,Z ,)gFZ~&q[ J6i=*d0');
define('LOGGED_IN_KEY',    '6d%j[`;E(yzQ6eAa$:.>;Vf:m:%h4Y=!kj&@c0t3iy8hEZGn[_9@/d;jfBptHCH|');
define('NONCE_KEY',        'mW.oX]J MU_w^Y}5mDD6t|icOO@TOB3RhY1Q/hJ0vFJ0q75H5AoQ#y`or%?U$TM~');
define('AUTH_SALT',        '~&%P}s/9&&CX7.%gy#d+j2H}4L#MNF?PPi!z<P1_Q8nnp2][|(A6P#G$dEL-i-p@');
define('SECURE_AUTH_SALT', 'J%+9&:7&y2~GrP1B,k7Hx31_>3I_J<f6rM=KV5`jLV|C]D*_:.b:t}+.V})h5!bC');
define('LOGGED_IN_SALT',   '0W;M&$aY`d@|c0x;}UuV7@7 PD851Aiapz~YHz3fi/;da<RRn|VM5mFg;@CNu?%o');
define('NONCE_SALT',       'h:)%B@d8;RR$[tt)ot<[0bV4S4oZd&#MB 9OlBW@A[boR.w v -<8(kB{$4`i58N');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'jigsaw_';

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
