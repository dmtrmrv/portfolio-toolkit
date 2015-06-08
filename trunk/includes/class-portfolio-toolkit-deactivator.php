<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://dmitrymayorov.com/
 * @since      1.0.0
 *
 * @package    Portfolio_Toolkit
 * @subpackage Portfolio_Toolkit/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * @since      1.0.0
 * @package    Portfolio_Toolkit
 * @subpackage Portfolio_Toolkit/includes
 * @author     Dmitry Mayorov <iamdmitrymayorov@gmail.com>
 */
class Portfolio_Toolkit_Deactivator {

	/**
	 * Flush rewrite rules when plugin is deactivated. 
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		flush_rewrite_rules();
	}

}
