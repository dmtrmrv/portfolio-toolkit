<?php
/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin so that it
 * is ready for translation.
 *
 * @link       http://dmitrymayorov.com/
 * @since      0.1.0
 *
 * @package    Portfolio_Toolkit
 * @subpackage Portfolio_Toolkit/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin so that it
 * is ready for translation.
 *
 * @since      0.1.0
 * @package    Portfolio_Toolkit
 * @subpackage Portfolio_Toolkit/includes
 * @author     Dmitry Mayorov <iamdmitrymayorov@gmail.com>
 */
class Portfolio_Toolkit_i18n {

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
