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
define( 'DB_NAME', 'kandkschooltransport' );

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
define( 'AUTH_KEY',         'XPS_tNy~1z&|7q,{|&tF8$br<sHX+J[mB&gPM.$&H>,o>l<1#l:tZ/&`A +/o+%8' );
define( 'SECURE_AUTH_KEY',  ':r~NHa8Y}p:jzQI!=-H2Mbs`#-&J/$Afpx,D0_j9j]a=uRi~;5QPO]hA13IP}!W/' );
define( 'LOGGED_IN_KEY',    'zpVUkh/m3N]ol+DjIo.O7ph3}uIBP__75o#L40o{l9P:pbeq&*B?J[7VKUmPs@~O' );
define( 'NONCE_KEY',        '5/TQ&NVOg/?w[@if?/5Db>_)@|(*rWfun_BTu-V~7{2n1 3#Oo)(c6*:n$hw;$/2' );
define( 'AUTH_SALT',        ' K$rteJ`YEV}{lgT&[>S?&Ra bTb6C#ds8w{?b3BYOk$V4rBTLE]Anchd<R#;Q>)' );
define( 'SECURE_AUTH_SALT', '@h|zP!$xQAL]ivEp-P|[$B6)*4tiJq;lmW.MIrF-t2-iC`:{1.Y=y6]&<[.tv%G0' );
define( 'LOGGED_IN_SALT',   'R/sF>&Wx_Rr4zIF&+/E8hULVXTB]O@,Ho7SOanO*C2cYmj&`7A[#m,JAs+hcyspM' );
define( 'NONCE_SALT',       'Ez4~~7B`0WarLB>{%ML^lC$*$>dejj>bzMhvKogK+OSWlECRg~F%tbw>* Z?z[6B' );

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
