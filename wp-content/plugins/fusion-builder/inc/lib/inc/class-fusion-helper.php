<?php
/**
 * Helper methods.
 *
 * @package Fusion-Library
 * @since 1.0.0
 */

/**
 * Includes static helper methods.
 */
final class Fusion_Helper {

	/**
	 * Converts a PHP version to 3-part.
	 *
	 * @static
	 * @access public
	 * @param  string $ver The verion number.
	 * @return string
	 */
	public static function normalize_version( $ver ) {
		if ( ! is_string( $ver ) ) {
			return $ver;
		}
		$ver_parts = explode( '.', $ver );
		$count     = count( $ver_parts );
		// Keep only the 1st 3 parts if longer.
		if ( 3 < $count ) {
			return absint( $ver_parts[0] ) . '.' . absint( $ver_parts[1] ) . '.' . absint( $ver_parts[2] );
		}
		// If a single digit, then append '.0.0'.
		if ( 1 === $count ) {
			return absint( $ver_parts[0] ) . '.0.0';
		}
		// If 2 digits, append '.0'.
		if ( 2 === $count ) {
			return absint( $ver_parts[0] ) . '.' . absint( $ver_parts[1] ) . '.0';
		}
		return $ver;
	}

	/**
	 * Instantiates the WordPress filesystem.
	 *
	 * @static
	 * @access public
	 * @return object WP_Filesystem
	 */
	public static function init_filesystem() {

		$credentials = [];

		if ( ! defined( 'FS_METHOD' ) ) {
			define( 'FS_METHOD', 'direct' );
		}

		$method = defined( 'FS_METHOD' ) ? FS_METHOD : false;

		if ( 'ftpext' === $method ) {
			// If defined, set it to that, Else, set to NULL.
			$credentials['hostname'] = defined( 'FTP_HOST' ) ? preg_replace( '|\w+://|', '', FTP_HOST ) : null;
			$credentials['username'] = defined( 'FTP_USER' ) ? FTP_USER : null;
			$credentials['password'] = defined( 'FTP_PASS' ) ? FTP_PASS : null;

			// Set FTP port.
			if ( strpos( $credentials['hostname'], ':' ) && null !== $credentials['hostname'] ) {
				list( $credentials['hostname'], $credentials['port'] ) = explode( ':', $credentials['hostname'], 2 );
				if ( ! is_numeric( $credentials['port'] ) ) {
					unset( $credentials['port'] );
				}
			} else {
				unset( $credentials['port'] );
			}

			// Set connection type.
			if ( ( defined( 'FTP_SSL' ) && FTP_SSL ) && 'ftpext' === $method ) {
				$credentials['connection_type'] = 'ftps';
			} elseif ( ! array_filter( $credentials ) ) {
				$credentials['connection_type'] = null;
			} else {
				$credentials['connection_type'] = 'ftp';
			}
		}

		// The WordPress filesystem.
		global $wp_filesystem;

		if ( empty( $wp_filesystem ) ) {
			require_once wp_normalize_path( ABSPATH . '/wp-admin/includes/file.php' );
			WP_Filesystem( $credentials );
		}

		return $wp_filesystem;
	}

	/**
	 * Auto calculate accent color, based on provided background color.
	 *
	 * @since 1.5.2
	 * @param  string $color color base value.
	 * @return string
	 */
	public static function fusion_auto_calculate_accent_color( $color ) {
		$color_obj = Fusion_Color::new_color( $color );

		// Not black.
		if ( 0 < $color_obj->lightness ) {
			if ( 25 > $color_obj->lightness ) {

				// Colors with very little lightness.
				return $color_obj->getNew( 'lightness', $color_obj->lightness * 4 )->toCSS( 'rgba' );
			} elseif ( 50 > $color_obj->lightness ) {
				return $color_obj->getNew( 'lightness', $color_obj->lightness * 2 )->toCSS( 'rgba' );
			} elseif ( 50 <= $color_obj->lightness ) {
				return $color_obj->getNew( 'lightness', $color_obj->lightness / 2 )->toCSS( 'rgba' );
			}
		} else {
			// // Black.
			return $color_obj->getNew( 'lightness', 70 )->toCSS( 'rgba' );
		}
	}
}
