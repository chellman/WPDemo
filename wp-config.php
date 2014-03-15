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
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         'n:&6kS%@G1-fd/qqeCCd/K|h|djIqf~ltx{N c-rq%jmvnV-A5O+;^M9S[Ve/4t[');
define('SECURE_AUTH_KEY',  'efW[OsxsYq*3g|#V$wR|R<R2,8,)SI{.4,JK%9s syx$W=wl}Y#F<M&)eMo-K>9x');
define('LOGGED_IN_KEY',    '},R?G<wwh Z|Zi0,K5WW%onH%LE*3g3U]Iv@JK[,+7L9c~++qGlU<dn4)knmZWcj');
define('NONCE_KEY',        '#LyH}|eJNzfQ=Ru8v~3gubp+0=J-?|TH.kuq?3IRx9eA/8;tO<p@yCu`JHtYmP&-');
define('AUTH_SALT',        '9*jK1y5h)!C^3ns)hPpB8MUB++/}|^k`>I+2];^+R p5#Q6[-BC>=78CnTG#${Ps');
define('SECURE_AUTH_SALT', 'MNSv]h2`$1RFl#c1bHQc0,hdvP|:k&Ke_-xw0$A@vCVn-pg~Jxws/33,VvgsDqvp');
define('LOGGED_IN_SALT',   '13@$`82-k_ZF.l`,_#L+vl dIQ:ymH_YyW4N.p=p<%5Z3Nj.kmzyWCq[7E^:1W[[');
define('NONCE_SALT',       '(Bob`x3]AW:VFZ{{k(_CE{|bt)q#HGVi~TNf:v6-laS&l>B7OV2Qfs-PMv )=y^g');

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
