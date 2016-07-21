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
define('DB_NAME', 'gj_portfolio2016');

/** MySQL database username */
define('DB_USER', 'gregjacobz');

/** MySQL database password */
define('DB_PASSWORD', 'nuggets420');

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
define('AUTH_KEY',         '<RUT5%YY& nt:2JQ^XC&b3Sj)?@Rb`)g>ToURMdix}U|%to.E2.`3)4]nv.D{y-I');
define('SECURE_AUTH_KEY',  'Dx`3/|eU!<?7^|G+XuU<q+Q9X)R#8CbwH%Wj>|ox q*c^}(^}s=ey)PRz^//Svm_');
define('LOGGED_IN_KEY',    'Jtbekf[5w_p*B04<RK@dclc3.exE8u~%a1fsXY$^@mN0|Y!?CD2D^pX2LA_fYB8Y');
define('NONCE_KEY',        'NDBZ0#:6f*Dd2^Oo%M L;%ZBU+C=^)+:M/YL P-=oJxnn(y7L%g^517G9#a]$`^{');
define('AUTH_SALT',        '`Z-S5qF)0snA`^6YX==:);1SX;ufG0}_Xv%z{7DNVTJ#JWg-mej#V7gIC{,NUAnt');
define('SECURE_AUTH_SALT', 'UYj+Wz@@6s#wSHA}ugt{P4w5MAn](IB!*t7Za{PZzO*?Rh!]qCsM}Aaw0s> x#b$');
define('LOGGED_IN_SALT',   '@NAf#3E1[^{&[+Y7G3owzAh].xw<IU7etzo&4sj!1$]X6aVhW?K5@es&?Ah~6Nw4');
define('NONCE_SALT',       '&!EA!HbNTjE4e:lEzm.+fkaG!n$Cei[+?s0[C~z2-]Pqu o[.gX@3QpF}IR9$p|C');

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
	
/*** @GJ - INCREASE MEMORY LIMIT ***/
/*** NOTE: Reference = http://codex.wordpress.org/Editing_wp-config.php#Increasing_memory_allocated_to_PHP ***/
define( 'WP_MEMORY_LIMIT', '256M' );
define( 'WP_MAX_MEMORY_LIMIT', '256M' );	
	

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
