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
define('DB_NAME', 'letts');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'jcF*tR<y-2AF*]B:Ym$-C9}}Py@9+a;pFY38()|bbvL{ +9-A^rQmJpM-(#U|zXC');
define('SECURE_AUTH_KEY',  '?J|i6ZJq^UlERD=ZB:wJRlg  %|UF9#D$F3-.uCz-as(ZoO&YV[Shvda3s[e*gc2');
define('LOGGED_IN_KEY',    'O#&MW4I%(y(b&VDLG&QpSY;2Za-i-c4v<dYE4<P}qy-hW$~O+nCy<,6hOu7VRVD1');
define('NONCE_KEY',        'C1UsJo;}B|MqR&dkBagR^vMG2j&]whOW$xIQzqC!+[/8I#K{rUuwZ7>,pyQem0vV');
define('AUTH_SALT',        'z4mRZ1Z8w$~FHO5V{YssK?XAT`v+PXl&:rEVMcW~3<gXt|sinPdQc|pyyyY+%=I{');
define('SECURE_AUTH_SALT', 'f0yqDustN^e<3G+[r>n>2OTdN{8qCjHb`dfK^SDxpOyLlm;~pJ1;jKom^2M}BIk7');
define('LOGGED_IN_SALT',   '-Fl/?G%J.rC8$$ Nn;r[+PIa7=_nG=so6L7Zctur_m<]YVQ|V7E!R$dbm6eTyuF&');
define('NONCE_SALT',       '#VuYZ%V@,FE;a?B{{2OY^s8g$DjReUGomdlSJj7~+lOPJZ3X]s-Xod--~+R[#]s5');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
