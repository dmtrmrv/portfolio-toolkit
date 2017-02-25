<?php
/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin so that it
 * is ready for translation.
 *
 * @link       https://dmtrmrv.com
 * @since      0.1.0
 *
 * @package    Portfolio Toolkit
 * @subpackage Portfolio Toolkit/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin so that it
 * is ready for translation.
 *
 * @since      0.1.0
 * @package    Portfolio Toolkit
 * @subpackage Portfolio Toolkit/includes
 * @author     Dmitry Mayorov <hello@dmtrmrv.com>
 */
class Portfolio_Toolkit_I18n {

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since 0.1.0
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain(
			'portfolio-toolkit',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages'
		);
	}
}
