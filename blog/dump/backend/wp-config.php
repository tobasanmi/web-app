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
define( 'WPCACHEHOME', '/home2/daydonec/public_html/blog/backend/wp-content/plugins/wp-super-cache/' );
define( 'DB_NAME', 'daydonec_wp680' );

/** Database username */
define( 'DB_USER', 'daydonec_wp680' );

/** Database password */
define( 'DB_PASSWORD', '8-pS61V1]x' );

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
define( 'AUTH_KEY',         'eaqed8gpdhtiphqzy2jo8w0gbegphbmpdswm5vimqzvdvkj1u4yjntcahdi8ss5y' );
define( 'SECURE_AUTH_KEY',  'enbqh4kytfeqtiphjnantovi2tawenj0jnyjrhlfbjh3s9wlte0v0asacyj0ovsj' );
define( 'LOGGED_IN_KEY',    'oi436xukifmwe4sjtgxnu1jsi3qlfrh5mblt8rwgjjucjuuk2h5zbbmlitimqzfs' );
define( 'NONCE_KEY',        '8lgiegkc6jbll0adzf5igd1r5il8hn6ipbrybf0divv5mwjhykbc2ywjaiyvf7wm' );
define( 'AUTH_SALT',        'ma7zkv0xv719csexhljqx0lu0vlki38aje9t1gojacwfhinx6mu98vcaolmogj5o' );
define( 'SECURE_AUTH_SALT', '4aki3wrj6vms0a3cxtsfulyhlm3cao2r2iahapmcomuauvv0qitv1ktpeqdpgbpz' );
define( 'LOGGED_IN_SALT',   'z763wiogh5ehzxa1fpsdxwqjzio5xqonkff6tzcsxyrhzmlonzr8tgkxqkr5f5aj' );
define( 'NONCE_SALT',       'rdczqu38pr0o0a8pdrehqjgomxjsuc1kfp7b0ocgdfic5jauzwbiijhf6aez9jxm' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpif_';

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
