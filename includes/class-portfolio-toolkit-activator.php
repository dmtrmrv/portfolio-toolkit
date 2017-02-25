<?php
/**
 * Fired during plugin activation.
 *
 * @link       https://dmtrmrv.com
 * @since      0.1.0
 *
 * @package    Portfolio Toolkit
 * @subpackage Portfolio Toolkit/includes
 */

/**
 * Fired during plugin activation.
 *
 * @since      0.1.0
 * @package    Portfolio Toolkit
 * @subpackage Portfolio Toolkit/includes
 * @author     Dmitry Mayorov <hello@dmtrmrv.com>
 */
class Portfolio_Toolkit_Activator {

	/**
	 * Flush rewrite rules when plugin is activated.
	 *
	 * @since 0.1.0
	 */
	public static function activate() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-portfolio-toolkit-cpt.php';
		$cpt = new Portfolio_Toolkit_CPT();
		$cpt->post_type();
		flush_rewrite_rules();
	}
}
