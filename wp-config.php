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
define('DB_NAME', 'wp_testdatsan');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '*jRbom,-ARiZ?lYH9CMJ.8[}ZnG6yGw13nCvuwtZQt~<%z$_/%1Vo+bOb3OCmnPc');
define('SECURE_AUTH_KEY',  'n  5)WkaEmSmF$BUTok4OL-|]w;y(VLQog.UWxtE]8.@$y#Wi-Hg_/+?FX.~w&ia');
define('LOGGED_IN_KEY',    'W>Le4gv3Jm5MLbL;Xeu^GZ9MIoR7y)C{M[R=lT`/!k!{[AG2AuSE+4@jYrq%o.f7');
define('NONCE_KEY',        'h+G*pkC%Rnl3#eb/6H;DYo`O.FK*S^Ch_L) Jr2lo5#}m8p]&@-QP/`WOEPWy3V+');
define('AUTH_SALT',        'Gic@f{XNx4/JfjSs3QLSP(}qX=+rewQ2-32`(^: J(n5vHV_X)3U,&7B|M:(nkM2');
define('SECURE_AUTH_SALT', 'N)efAO?ZTby;1%MP}.KGW9s{</1SL2r2 OI@t:368QzrqQMh7ouTNR3T*|8PuEue');
define('LOGGED_IN_SALT',   'puwAYN,ZW/q]qU%1xdRJkjj|yyEoMYKHOGP1qOq-,s92n;7*-|W,g2sc$+EBK:_7');
define('NONCE_SALT',       '6-W[}F$|V5z|fI5|%R9.qac87<TPkT.2O826A+B%O$ch(5&s8j5%N&6:4E9Tdolt');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
