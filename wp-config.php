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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'laura_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'K9ATa[zxv0ujh/}Dm9-<8`1_Y2%R+F#lJ{1+z^!;+/gW.;mZFq?^Qh|Nd]K&Mz@c' );
define( 'SECURE_AUTH_KEY',  '-F$ ?O#nVv^#Qxhg%XS/Sv/||J^wQ7:FOV_YMz7sA`t&&ZTNEZlZFI3u1atYZ!mk' );
define( 'LOGGED_IN_KEY',    ' !Scm.e{>s$$MUIff^8ERZJ@?v1chP64k-29xL9.!NDW$?dqWR<RfO/*cw<XDS h' );
define( 'NONCE_KEY',        '8&V5KB#dNY$W>4y0d &`FQ~DZF26g.dJYCe~H1r?[;T/F09.CH6^|1sS$k^zUAZe' );
define( 'AUTH_SALT',        'bozcRd^7a,~?{R1#{2WBv 5r84n1H:M*;$B@b2xZV8&vYV*2bbosiv$,k0|SV~TU' );
define( 'SECURE_AUTH_SALT', 'uJVNI}C;5!]G|7J#@y}.0w$ITvS;.)E5(`K#bn~zi-A>?E`#q*d~.x 0$ S?)l#J' );
define( 'LOGGED_IN_SALT',   ',}~=OZ_!960C:|}6~.$Al 9W/ AxDw@SEEEf({Czb3T%PX*iggrC apdq#.;NC,1' );
define( 'NONCE_SALT',       '7h m@4i WScG0`aRd}Oou0Qz+)Bf]OsQmQ8:IS9;w:w*!%vvQ^7$#:~$ab|KJR$`' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
