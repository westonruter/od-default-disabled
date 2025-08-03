<?php
/**
 * Plugin Name: Optimization Detective Default Disabled
 * Plugin URI: https://gist.github.com/westonruter/9e9036e8dc11292279a90995273c7adc
 * Description: Disables functionality in Optimization Detective by default unless the <code>?optimization_detective_enabled=1</code> query parameter is present. This allows you for troubleshooting issues on a live site without visitors seeing a broken experience.
 * Requires at least: 6.5
 * Requires PHP: 7.2
 * Requires Plugins: optimization-detective
 * Version: 0.1.0
 * Author: Weston Ruter
 * Author URI: https://weston.ruter.net/
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: od-default-disabled
 * Update URI: https://github.com/westonruter/od-default-disabled
 * GitHub Plugin URI: https://github.com/westonruter/od-default-disabled
 * Primary Branch: main
 *
 * @package OptimizationDetective\DefaultDisabled
 */

namespace OptimizationDetective\DefaultDisabled;

add_filter(
	'od_can_optimize_response',
	static function ( $can_optimize ) {
		if ( ! isset( $_GET['optimization_detective_enabled'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$can_optimize = false;
		}
		return $can_optimize;
	}
);
