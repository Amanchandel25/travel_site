<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package     Andaaz
 * @author      Amjad Ali
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 */

/**
 * Only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_parent_theme_file_path( '/inc/back-compat.php' );
}

/**
 * Assign the Storefront version to a var
 */
$theme              = wp_get_theme( 'andaaz' );
$andaaz_version = $theme['Version'];


$andaaz = (object) array(
	'version'    => $andaaz_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-theme-init.php',
	'customizer' => require 'inc/customizer/class-customizer.php',
);


// Custom template tags for this theme.
require get_theme_file_path( '/inc/template-tags.php' );

// Additional features to allow styling of the templates.
require get_theme_file_path( '/inc/template-functions.php' );


if ( class_exists( 'Jetpack' ) ) {
	$andaaz->jetpack = require 'inc/jetpack/class-jetpack.php';
}

if ( andaaz_is_woocommerce_activated() ) {

	$andaaz->woocommerce            = require 'inc/woocommerce/class-woocommerce.php';
	$andaaz->woocommerce_customizer = require 'inc/woocommerce/class-woocommerce-customizer.php';

	require 'inc/woocommerce/woocommerce-template-hooks.php';
	require 'inc/woocommerce/woocommerce-template-functions.php';
	require 'inc/woocommerce/woocommerce-functions.php';
	
}

/**
 * WP Bootstrap Navwalker class.
 */
require get_theme_file_path( '/classes/class-wp-bootstrap-navwalker.php' );

/**
 * Load the TGMPA class.
 */
require get_parent_theme_file_path( '/inc/plugins.php' );


/**
 * Customizer additions.
 */
require get_theme_file_path( '/inc/customizer/defaults.php' );
require get_theme_file_path( '/inc/customizer/sanitization.php' );


/**
 * JetPack compatibility.
 */
if ( class_exists( 'Jetpack' ) ) {
	require get_theme_file_path( '/inc/jetpack.php' );
}

// Merlin
require_once get_parent_theme_file_path( '/inc/merlin/vendor/autoload.php' );
require_once get_parent_theme_file_path( '/inc/merlin/class-merlin.php' );
require_once get_parent_theme_file_path( '/inc/merlin-config.php' );
require_once get_parent_theme_file_path( '/inc/merlin-filters.php' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function andaaz_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
	}
}
add_action( 'wp_head', 'andaaz_pingback_header' );


/**
 * Return a percentage.
 *
 * @param string|int $total Height.
 * @param string|int $number Width.
 */
function andaaz_get_percentage( $total, $number ) {
	if ( $total > 0 ) {
		return round( $number / ( $total / 100 ), 2 );
	} else {
		return 0;
	}
}

/**
 * Convert HEX to RGB.
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 * HEX code, empty array otherwise.
 */
function andaaz_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ) . substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ) . substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ) . substr( $color, 2, 1 ) );
	} elseif ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array(
		'red'   => $r,
		'green' => $g,
		'blue'  => $b,
	);
}

/**
 * https://gist.github.com/stephenharris/5532899
 * Lightens/darkens a given colour (hex format), returning the altered colour in hex format.7
 * @param str $hex Colour as hexadecimal (with or without hash);
 * @percent float $percent Decimal ( 0.2 = lighten by 20%(), -0.4 = darken by 40%() )
 * @return str Lightened/Darkend colour as hexadecimal (with hash);
 */

function andaaz_color_luminance( $hex, $percent ) {
	
	// validate hex string
	
	$hex = preg_replace( '/[^0-9a-f]/i', '', $hex );
	$new_hex = '#';
	
	if ( strlen( $hex ) < 6 ) {
		$hex = $hex[0] + $hex[0] + $hex[1] + $hex[1] + $hex[2] + $hex[2];
	}
	
	// convert to decimal and change luminosity
	for ($i = 0; $i < 3; $i++) {
		$dec = hexdec( substr( $hex, $i*2, 2 ) );
		$dec = min( max( 0, $dec + $dec * $percent ), 255 ); 
		$new_hex .= str_pad( dechex( $dec ) , 2, 0, STR_PAD_LEFT );
	}		
	
	return $new_hex;
}