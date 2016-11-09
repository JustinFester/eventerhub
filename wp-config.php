<?php

/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */

if ( file_exists( dirname( __FILE__ ) . '/local-config.php' ) ) {
    include( dirname( __FILE__ ) . '/local-config.php' );
}

define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'determination22');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define( 'AWS_ACCESS_KEY_ID', 'AKIAJVUGF42OMYSCVSGA' );
define( 'AWS_SECRET_ACCESS_KEY', '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' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '.c1]QJn#RViW@1~mo1+/|_$cpjS$KAaF#Wni~*6Cm$+3mr0A`&;g2q9k,CG:ih}w');
define('SECURE_AUTH_KEY',  'j|sqv]t!es#!F+1t+NAC@zD]}sxg>2H=tQTG* >QF@BkWT#IyPU-b3c<SxDX~/v6');
define('LOGGED_IN_KEY',    'z+OPM1FOv+,7u&!^F`iBfL[|Fy!dxA@lDYljq[]8IZMQD*l[)jlRpx$9JWBWij_U');
define('NONCE_KEY',        'CWz4+L?HN+_V[pQ19:P6O4o Z`0=tzv5Yf%H?h;_`UOU%)-oBionut^[bK#DlzbY');
define('AUTH_SALT',        'C0suXYb=W(70cuHP3Tn|Nj,]xy%as/BK3ct)>-3Z>=.Havl%5F%}0+:[u6+.JeUl');
define('SECURE_AUTH_SALT', 'X?t<zN{Lqhlj|<x(17Iok%/M_^K|AHpxqR8rraotRf5dt&dx{=?&:=W|F`$^vYv*');
define('LOGGED_IN_SALT',   '#CB9F5TO,{eJ;i@^|3^G`6py(DQ{}4>D0+y-+<7@+xg~Y-#>9DCs5V|&7mUN$x2]');
define('NONCE_SALT',       '2;3>.4?bR{@+/tyWYX1cG^{x{fs-8{vOnf9M-`X2F#P-vDlpTdA5IoqT^Id$6=^2');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ge_';


/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

define( 'WP_AUTO_UPDATE_CORE', false );


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

define('WP_MEMORY_LIMIT', '512M');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
