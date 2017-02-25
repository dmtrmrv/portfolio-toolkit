<?php
/**
 * Fired during plugin deactivation.
 *
 * @link       https://dmtrmrv.com
 * @since      0.1.0
 *
 * @package    Portfolio Toolkit
 * @subpackage Portfolio Toolkit/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * @since      0.1.0
 * @package    Portfolio Toolkit
 * @subpackage Portfolio Toolkit/includes
 * @author     Dmitry Mayorov <hello@dmtrmrv.com>
 */
class Portfolio_Toolkit_Deactivator {

	/**
	 * Flush rewrite rules when plugin is deactivated.
	 *
	 * @since    0.1.0
	 */
	public static function deactivate() {
		flush_rewrite_rules();
	}
}
