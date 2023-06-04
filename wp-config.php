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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'book_ticket_movie2' );

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
define( 'AUTH_KEY',         'Iua#/0.bfXG^|gKM5l=<C7ALw=k~hjix`G+W2Uls^6XWfH5((J-nvb;ZO;fv$q5!' );
define( 'SECURE_AUTH_KEY',  'CA+?$$%u`:to]eu|Bzh6?ad9q.Xf%!jd#`w)`#k(x4wZ9rfG/PPP^>zWF*j~;0`?' );
define( 'LOGGED_IN_KEY',    'oBoqawR;?d{_Gc%{ ya7Y#t)3ev2:?}_Odx$r@Fq|-t,vCkoJKU 8$qCp|jEG(_I' );
define( 'NONCE_KEY',        'GC2]uEw::DUy^uR?9T#7mTILKrJ;04@Vt=[w>0-!VyI.Cf=Ena~Gi7Cby|az*M1x' );
define( 'AUTH_SALT',        'k{@zic9l(I@r]|se_a=UPA@SaU44!0W!o|>d$-}IMqn;T%D&T+rbYP)&Obd?|sVx' );
define( 'SECURE_AUTH_SALT', 'm.@q(!>qQFivRi;?vKDt3C;Fghup9~U/BbfT</>*$,n-c^N3%lJs.[i)9rI~A^jc' );
define( 'LOGGED_IN_SALT',   'S  v1>K|ORM^s3_^I>#2PqRAe?Rej+lJyqlzBP,[6L<7zV?K^BF8zI4@%Vx|2`*E' );
define( 'NONCE_SALT',       't]x@ciE;[v+#_<b(n4lFl390= F)_.8fcmbCl>%3di_#Vg(i;tgxT;>3De  ~y:F' );

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
