<?php
/**
 * Plugin Name: Optimization Detective Default Disabled
 * Plugin URI: https://gist.github.com/westonruter/9e9036e8dc11292279a90995273c7adc
 * Description: Disables Optimization Detective by default unless you supply the <code>?optimization_detective_enabled=1</code> query parameter. This allows you to debug issues on a live site without visitors seeing a broken experience.
 * Requires at least: 6.5
 * Requires PHP: 7.2
 * Requires Plugins: optimization-detective
 * Version: 0.1.0
 * Author: Weston Ruter
 * Author URI: https://weston.ruter.net/
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: od-default-disabled
 * Update URI: https://gist.github.com/westonruter/9e9036e8dc11292279a90995273c7adc
 * GitHub Plugin URI: https://gist.github.com/westonruter/9e9036e8dc11292279a90995273c7adc
 *
 * @package OptimizationDetective\DefaultDisabled
 */

namespace OptimizationDetective\DefaultDisabled;

add_filter(
	'od_can_optimize_response',
	static function ( $can_optimize ) {
		if ( ! isset( $_GET['optimization_detective_enabled'] ) ) {
			$can_optimize = false;
		}
		return $can_optimize;
	}
);
