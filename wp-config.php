<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'hwchronicle_com_1');

/** MySQL database username */
define('DB_USER', 'hwchroniclecom1');

/** MySQL database password */
define('DB_PASSWORD', 'fcyyWFmk');

/** MySQL hostname */
define('DB_HOST', 'mysql.hwchronicle.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '1R)d`z/_c08((7uB6Wft!%}. 947ILr_L*e(rV mA9.rh7r%}#E=^bMc.F+R@:[&');
define('SECURE_AUTH_KEY',  '~L?Wx*`70Srl!Q6cmyL1~3J/x(GiY=l*Gfm`1[5$p86tmj@K3Hp^:&FB[o[LuVir');
define('LOGGED_IN_KEY',    '},u3*j _OU(A|-G$s`JJ*|[^(NgEGA!}Ed+,$!63V{:R2^%w7$?`R6RDmO%a[*aY');
define('NONCE_KEY',        '^o||p.WZ_`C*<k)0L-;u|.+f)Mlc :(b^TrFdX82M]HOt[.URw_w4Kd5|,8#W/qW');
define('AUTH_SALT',        'qQt<jm:L,9$G<={% LhJSA*oxu$.t><+0T8Y?Einl<vhX$Q38g|COa@mprt0ht{?');
define('SECURE_AUTH_SALT', 'f8-cX4jJ(#E8o+i?xp4Vikfz:)o@-s=lE[dgls]R:W,I|YM;(U5jmC?-/hj-:W+X');
define('LOGGED_IN_SALT',   '-?B:k%z&/L=$`9UqJA:S<u*+7.e7FX40aZg}3RKsUf|.FBl|9$Mt}<m-]K1HyRho');
define('NONCE_SALT',       '`qqJmA4z&>:,|!Q.9.-5lJ#/ 5zH*Yiv**p[~UZ68(]+IqXQ+*r#rf/T|2a++iwF');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_teii6p_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
