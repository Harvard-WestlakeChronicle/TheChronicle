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
define('AUTH_KEY',         '9ui!!A#bqJ0~C$e:|qWL^|j/_{LPESSjHr|yZXBEF6z+R-/^nEUXFRN/MGZC=2PP');
define('SECURE_AUTH_KEY',  '3+_Q-_kaNUx(|_e*~];;X.VIf];H.,J]#-@/C|D]pzI%+9e`8fYBlPoZsqb+7K!D');
define('LOGGED_IN_KEY',    'J@%m+?D1c8j5sQ!7eIv%>W7)a6^:!WwA[HpYz_XJUf.BE=[nAO5|*z5=1D20-@ip');
define('NONCE_KEY',        ':<#;z)lLr=6>hzh>T4^0#_xx(1uv0DORc:}5:5B:12rPOh)CW^f*^S4_m/Q9Iv#%');
define('AUTH_SALT',        'rU(Og?|-0]W`P{U|*}6<?}.j8UD Sq}TPdm+To1W)h?hrnb4RBJc.|`D*ooV *&|');
define('SECURE_AUTH_SALT', 'B{|GE hFyh%y:8L-@^7A,ObII|4rn8A?>qe9t)&m[KYUo(W&bR 9mF1^pEy1f_:y');
define('LOGGED_IN_SALT',   'b+.dbx|/b,PTbwThI>2x1+29lb/T9ca;XiQK8T+XY(V#f3O{>>oY{`{hkpgyv8`*');
define('NONCE_SALT',       '9ltFQtFohka/-.kKkf(T&skN{H|00O9$@IY 7+r|Ns-|}xP?{o&2C8R_Y a<h2R>');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_teii6p_';

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
