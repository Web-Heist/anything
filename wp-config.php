<?php
define( 'WP_CACHE', false /* Modified by NitroPack */ );
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'anything' );

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
define( 'AUTH_KEY',         '2G$KBN^J2b!.qzu.mx^,}g)$35Pu,cjd(K^_HPCZF{iGzK2Bol2{<}IhPqKU0fmc' );
define( 'SECURE_AUTH_KEY',  '`pDX6h@L1yG_5KbDZ&0cfMzq.aR{skl=b!)jVv-%}l:Xosg~D +wqff~0UpcabGs' );
define( 'LOGGED_IN_KEY',    '!`68!dEJ$(ymC+We?(9MNIF56|&I . Hf`H56.!nxl=ZTvNLPw;_&gaJq*wz,5/8' );
define( 'NONCE_KEY',        'Q(|N/mOHh{p3]6PGm{--ki,9I}5{.la4o(rZ* kQC$]*).NrMdFLX<+nPF=o-ab2' );
define( 'AUTH_SALT',        '<nc_?ev3.E[u|aQ~[8p{H|T)b]hk`5H.6VzLQJdqS=r%{F+M7f*/tt%%};VsUp=!' );
define( 'SECURE_AUTH_SALT', 'lmP}X<<ToS4We/45|zo^wd8>n@vbxM/y 8KAH2J<VvCu-s$<=0^%A:pm}t)5v{90' );
define( 'LOGGED_IN_SALT',   '/%H4KS0]?_#)yE YSjJ~R^y.t2#v07D8p.+ZXP6mwQQQ3T|(}q+}n9B/BeIbjq0U' );
define( 'NONCE_SALT',       'xjK)5$Z@VqbxoW?S@Sn ,`Q!%f[[.rhJWm@!WMBF.S?ng`W6h2T}.^(c6M^dj;%~' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
