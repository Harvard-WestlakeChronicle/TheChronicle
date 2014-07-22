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
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home/hwchroniclesecure/hwchronicle.com/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
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
define('AUTH_KEY',         '+6puk,,Au]FI})^TR|uu|mr!;L,_ ZA-Ar|Ny |S[vC8D)r!vsrgWzO_}YGx6^+)');
define('SECURE_AUTH_KEY',  'LLB_+p<!RE}i59Mb.NKe5g?A*H!id9X2!u#*| Jq+*+lS38p:i1_0/BtB.oqO5BS');
define('LOGGED_IN_KEY',    'H7qu/0aoKjn<U5<fm*@1i0?)0WZ<_P#h`}Q]V A{|f3mdA=IV2oJ#WJCj.Z7|bgt');
define('NONCE_KEY',        'o<&p?R3=!.n`?[p>L4y&y^Cj{7!7#U>|[M~Pa{A%Agab@g2&JWB>|qAXU.M0>ATW');
define('AUTH_SALT',        '*Rbz![OAar4ZaZi?VS2 uQ-V3_|~R[[+YDP0jgTZyLGHPqh-B>kDOv[Qqo-z`4td');
define('SECURE_AUTH_SALT', 'E;,{Z1u0K.Tua&(.)]PR:WW!p43ASz`B$F0|FX.w_=3=t2q&-&U.JZx![nN|+*xV');
define('LOGGED_IN_SALT',   'bh;S},4p:2h$|Y*;G_oIX}&_,tKKVlbh^TgRE?&Ha.tDLmpb$894g^|pcZQ]k+dz');
define('NONCE_SALT',       '$] 7B%-Go6A6_~?=)qyAA/LzBV!;z~J+#mcrZk)sX*d|sJ^4EIyqjmT)2-?:az!j');

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
