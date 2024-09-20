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
define( 'DB_NAME', 'theme_practice' );

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
define( 'AUTH_KEY',         'UL*|]|],ZQPG}Mk-u6qdM}s5Au=(j3xs(0]b2c`r=lk?|ZzVvT=/v@v;Ci=K=|x]' );
define( 'SECURE_AUTH_KEY',  'O~s ~AWvdZU8YvFs0w;xukOD}l6CW+mMrkG7d|Su,E8@]Nw_X5QRQ5rZ,Hl:6PQZ' );
define( 'LOGGED_IN_KEY',    '<7_v6n^EMEHJ~[.<d`OO5XaFSLKn!]Ycos<Z:VZKNr<P,*K1V{X{Lp*@t1KNcQ ?' );
define( 'NONCE_KEY',        '%:r^4x!)NXZbE8%9Z:BDI[^Q&nA5Bc8108AzQL%^ja]I|Wp|Bu{rO=p7FLXk.Z_b' );
define( 'AUTH_SALT',        'Ek`</%zJL$PZ&g(wK_9aG/0 c ;uDO[kD/9aTu+BwC|/x)!RQGoT@JDb6ks HhU/' );
define( 'SECURE_AUTH_SALT', 'v7.:g_Sgo-7d&st9SGh*<-i^NNJ34%VDY!Zw{g[#a:Nygw^NxzV12j31;zls~bLj' );
define( 'LOGGED_IN_SALT',   'QG^Sw=V`,<14sZr3*S)951ERoN~Xznq/c1FY(:#Y v4GH9cVQKS@Z$qv_y4GxA.{' );
define( 'NONCE_SALT',       '$0-.dLMisX`G69t&83}8S[bYNLuU{J9Cj;6*5PV%Q4cD-`y[jxM5n_u6[~flw-?u' );

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
