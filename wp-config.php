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
define( 'DB_NAME', 'elitedesignstudio.github.io_db' );

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
define( 'AUTH_KEY',         '&eSTwPG%%*cC010PM9b:y&-Csgw9=Mo,vs%&/#8o{fVb($7{r9_{FR0+7dT]T$,&' );
define( 'SECURE_AUTH_KEY',  '~~@^V39Fhh;%ym{(umY^LH+2`IgILbfM>^4ZoN@r*sf={|.o5dng^.zLRhi%cMy#' );
define( 'LOGGED_IN_KEY',    'erUaT 9R,|Eyl`BE|Qh5Vc(h9}{C:9Ms=3$EKY!4J<PT7):P?V31.!:nDsi44Vct' );
define( 'NONCE_KEY',        'j4OfRkS)9GHy0cKBDSh=c!0yWTx$`k3yP&dQDE3+v$aD*LDDRWl?V5`F$25zL9f.' );
define( 'AUTH_SALT',        'B(oZ&HWd|wPa*~5$A5q`N|Xw|qr[JZZSu]`K3|lwEm$zb#;,wx%+[4Z;v`^.PiL8' );
define( 'SECURE_AUTH_SALT', '}2%O_p6TN7C6xxX#oG_D^euWx.F7%PyTq&?.6+jK9V#n,x>Q#Es_r,LiGomfX#=[' );
define( 'LOGGED_IN_SALT',   'F]1CaRja:78=n)1v[ZQcUXB77evqs 71@V?Ziv@$JxqRu>BBfY.tl20+aTAk[@1)' );
define( 'NONCE_SALT',       'xCr>(|B?{K9C.2Wq#Fv2s+(m)x5EL`1+Lh0;Fi;G>lYMW`{spCW2^;Y-ox(^Vy*g' );

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
