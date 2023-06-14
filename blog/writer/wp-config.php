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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/home2/daydonec/public_html/blog/writer/wp-content/plugins/wp-super-cache/' );
define( 'DB_NAME', 'daydonec_wp561' );

/** Database username */
define( 'DB_USER', 'daydonec_wp561' );

/** Database password */
define( 'DB_PASSWORD', '(1(pLS23d8' );

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
define( 'AUTH_KEY',         'clxkwuq1nykpd7xfxkcpe9dsoccj0h1stwj1oz3ls1p8mxycnhz93hx0qhmnsiez' );
define( 'SECURE_AUTH_KEY',  'jxfc82gqcjf3ntbm4j4guehu0u26teivpet5jguszawaslzv8jt53jn5appa6ddn' );
define( 'LOGGED_IN_KEY',    'o6hn2vylvk7xcrmjo4hbnk9pkdslxadfmywf9vxl53rn8srnijybgisyflsyqpoq' );
define( 'NONCE_KEY',        'j9lbzejnzg0jcomaxnuzpoewed2pwruhkynspspc66ajzvwiwh9mkr4xy2hhzfs5' );
define( 'AUTH_SALT',        'bzv7btdq07xlrjfw6eisisakginid7srj1cfadufmchhlccfooiydsxccmlvz56y' );
define( 'SECURE_AUTH_SALT', 'ym0od4rm2zrczu8cmvwsxmwxuqcznfy4oj0vqyerhrlu8xoq8bllk7t5fjspdev2' );
define( 'LOGGED_IN_SALT',   'zmhexrvg24tb68ty4sp1e0irywd45gtao7dvjpypndmabyowfryeyh2ofgepkdau' );
define( 'NONCE_SALT',       '08obvyrix0xrcfdo6nzxu1xtcxmxvm69grxernp7aa4athtpm5o5geejjtaya9mc' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpay_';

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
