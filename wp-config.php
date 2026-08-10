<?php
# Database Configuration
define( 'DB_NAME', 'wp_flightclubpro' );
define( 'DB_USER', 'flightclubpro' );
define( 'DB_PASSWORD', 'eFkdvuLSACeDcsSESmJ5' );
define( 'DB_HOST', '127.0.0.1:3306' );
define( 'DB_HOST_SLAVE', '127.0.0.1:3306' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         'FCG5aWy$CEr~X?`g)UAI7SXePcoT`las7!FV;|/3g@$[#+ADVJiY&Vh}SA$uxeU]');
define('SECURE_AUTH_KEY',  'w{rA( [Ja0R(D=iEs#(7NR-D`ukdhd.v5Rf3:--b+1U/,$__I(u|ZEiOqutV!-R;');
define('LOGGED_IN_KEY',    'H?F=q;l&R{Znea|^]||8snjNNQA_7d&Z0mGMk#3)y~-t(<-}_8~k-=uXDf8>vd|C');
define('NONCE_KEY',        'Nx[;0U iL}^w[8N(gXxf`wVdR/_{h&+-[ 6]$@TSz(D$8>Y5`!%-pyTa9F/Tog|}');
define('AUTH_SALT',        'XJ~qJV { 8N(nUfA-0]Qnt-zO~gFQ nIXIF7)oJHfl=<`-Rzu!5i@fkj-H>#| OR');
define('SECURE_AUTH_SALT', 'QXnSaKrc~n_f^UURzx^`II^$^3; z~1S2;+iLGMrCWtxVRI|/>%-6SaLv1B$f.={');
define('LOGGED_IN_SALT',   'F_PB-9<Q5s|&p ^wjP2a,rG(VV#}@,OP+98mv+B2`S3H]DN(ZKe:Y|aCe&c87U8[');
define('NONCE_SALT',       'Oz-R2D&05Thz+rZEI75[bTtW?+-wtyYJe@@w=Ki7@pQ_*?9l0+ |wH%O`p&IBe7v');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'flightclubpro' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

umask(0002);

define( 'WPE_APIKEY', '32d6535f0630da32be485911e95ba0959ff1666b' );

define( 'WPE_CLUSTER_ID', '401251' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', true );

define( 'FORCE_SSL_LOGIN', true );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', 250 ); // Configured by WP Engine

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'flightclubpro.wpengine.com', 1 => 'flightclubvip.com', 2 => 'www.flightclubvip.com', 3 => 'flightclubpro.wpenginepowered.com', );

$wpe_varnish_servers=array ( 0 => '127.0.0.1', );

$wpe_special_ips=array ( 0 => '104.155.167.187', 1 => 'pod-401251-utility.pod-401251.svc.cluster.local', );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );

define( 'WPE_SFTP_ENDPOINT', '34.44.227.159' );

/*MEMCACHED_ENV_START*/ if (isset($_ENV['WPE_CACHE_HOST'])) $memcached_servers=array ( 'default' =>  array ( 0 => $_ENV['WPE_CACHE_HOST'], ), ); /*MEMCACHED_ENV_END*/
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', __DIR__ . '/');
require_once(ABSPATH . 'wp-settings.php');
