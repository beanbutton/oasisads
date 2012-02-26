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
define('DB_NAME', 'xoasisadsmedia-oasisads');

/** MySQL database username */
define('DB_USER', 'xoasisadsmedia');

/** MySQL database password */
define('DB_PASSWORD', '2awareads2');

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
define('AUTH_KEY',         '#9u<3pfW^d26mU}(5g>=W>cc7xBjs#<J_0w?,:VP8.8otzx<pi9;d*&9SC-S=# (');
define('SECURE_AUTH_KEY',  'z&,zBUv@Pxe0JdjkMr0tgd7q^K1F0=>yJgn(INOo}}v`!Xq)mQ(T{gkz}(B)WA*H');
define('LOGGED_IN_KEY',    'Ndb-EmcqnBu[L)~E?bYt]68l}(_S>*?SW(o>E};qLoi@Z&&9GV(dq,bXbY:kR@I]');
define('NONCE_KEY',        'ppf:i1MhU2||,ybs93U%J[=xMV,fH%5iC?k[`p+K7&%BJ0%7+FVru ,Dd8@&.idu');
define('AUTH_SALT',        'jw~jZ>:u(..,!.DAB:vv=&hgu,p4+`xb9^@3O]7K>2DzF<j1,jSEEVa|H627d_uu');
define('SECURE_AUTH_SALT', 'IQ:;RCT)x/cx},9KP[t=aQj/57w,h;()}:w-$<rELvD{GpTSV-OT cR$_*SKW/;J');
define('LOGGED_IN_SALT',   ' d/G%YRk8jGpiW^(,ii9O&Xsibq-d^s+JI^x3>w=%qsLec4[+xTDVv:b@&(;h^o9');
define('NONCE_SALT',       'bm&pm (PDsi|8UC@j-oklr QsC{/vI,iifQC2EW+1<1,Suae+w/t&jf+)+$>1D4f');

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
