<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'homwe_connect' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'g5Nz5OJ>[;@v6_.ZVB1iERM:;tW1B[LzH.RyepC9&8,xaKFFC-}mCaUF!y0w39LH' );
define( 'SECURE_AUTH_KEY',  'xM+;LV}[3>FE~gaIld[U=C5cqc>qWMi[SV$7^Ln[ez!woee$VYlz@ed( .iW;t_O' );
define( 'LOGGED_IN_KEY',    '@|X;s6EVvZa:H20zc v,O!i8f[U):;54u&v:gk{5Q8VVeEEjhCS~U%XCrT8R`tpQ' );
define( 'NONCE_KEY',        '8IF_mizj4JZW|1@S.?i?WV[jJzB)OrU;#(<4?*8Svh% F2!/o&c_F>J6Pm?+-$|!' );
define( 'AUTH_SALT',        'qU(j1u_[$;meRIQp_=kR Xy#>9ZPDX$yx{;k,zUPU8?jn#e_>dPEwuVVk<.,3>pU' );
define( 'SECURE_AUTH_SALT', '?-CdT{/l6]+b5zOXP3)vfMc-SrpuXdmro4.T`<uMt- lOxB#LBD|0E4m07gV/0{o' );
define( 'LOGGED_IN_SALT',   '}JWRGjX5p8M,i`@OzyM?|+bY-BUuj)m^ee|keu&NQSW?scv#J6JjS#&rG3fkycqj' );
define( 'NONCE_SALT',       '$A|,A7h5EyVB_f*#i0*3]d8?EP-|RU!yj$fh.XMss5m>,UG?%yMXNm0k#?ni> o~' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
