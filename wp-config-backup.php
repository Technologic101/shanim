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
define('DB_NAME', 'shanim');

/** MySQL database username */
define('DB_USER', 'dev');

/** MySQL database password */
define('DB_PASSWORD', 'development');

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
define('AUTH_KEY',         '9JU9aaQAv4dm8Ef=SLd&JPCV4^Yj6!9P5#s$>Cplddm$K5vY`v%eQ&_li|5UWQ!2');
define('SECURE_AUTH_KEY',  'Aa@1z#E_SJpBV=Y.<XRdW-qI*&q!?KAftYi_QYc.n}d4b}bW]X6}Kr1}bWUhV`&;');
define('LOGGED_IN_KEY',    'X8$}eejc;R?f]:On{3Rp,{M9y(`CehD$njaG,f:</&p0](4Q4)N)G++`EZe+@+lF');
define('NONCE_KEY',        'v?6!zlw^po4GL5sjh=[1%c.UC~7`_4[,cS-j+A>nLHsEb8(;)`:NFsCrD-95S9/[');
define('AUTH_SALT',        'e+5f}v~4_vBG0LvB8|..d5[U%x0Fd!a-)q~wmXYreEy5uL}QY}%nX9so:#Y!8IAn');
define('SECURE_AUTH_SALT', '?$3/BKnrWY7le/< zklN45seNl<vJZKCV+S(ac%V-1.mB:aVp;Bm#REEO(`K0Gw0');
define('LOGGED_IN_SALT',   'B@KWKg7>wtjm1F@=iTKS%kL[1VY:`~QwtQ]WG%4.,Wq3x1*#tkyCIM+<Yqe:k[bU');
define('NONCE_SALT',       '|Wud6|R>Xg)_*1OUPc0-GG)MBUm.Ml`FW?>17d#EMD_1Fw;_ZOwicS!/.SDF,h+8');

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

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
