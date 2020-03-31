<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://dmtrmrv.com
 * @since      0.1.0
 *
 * @package    Portfolio Toolkit
 * @subpackage Portfolio Toolkit/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization and hooks
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      0.1.0
 * @package    Portfolio Toolkit
 * @subpackage Portfolio Toolkit/includes
 * @author     Dmitry Mayorov <hello@dmtrmrv.com>
 */
class Portfolio_Toolkit {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power the plugin.
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    Portfolio_Toolkit_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since 0.1.0
	 */
	public function __construct() {

		$this->plugin_name = 'portfolio-toolkit';
		$this->version = '0.1.8';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_cpt_hooks();
		$this->define_meta_hooks();
		$this->define_admin_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Portfolio_Toolkit_Loader. Orchestrates the hooks of the plugin.
	 * - Portfolio_Toolkit_I18n. Defines internationalization functionality.
	 * - Portfolio_Toolkit_Admin. Defines all hooks for the admin area.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since  0.1.0
	 * @access private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-portfolio-toolkit-loader.php';

		/**
		 * The class responsible for defining internationalization functionality of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-portfolio-toolkit-i18n.php';

		/**
		 * The class responsible for creating 'portfolio' post type.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-portfolio-toolkit-cpt.php';

		/**
		 * The class responsible for creating meta boxes for 'portfolio' post type.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-portfolio-toolkit-admin-meta.php';

		/**
		 * The class responsible for adding image admin column and loading admin css.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-portfolio-toolkit-admin.php';

		$this->loader = new Portfolio_Toolkit_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Portfolio_Toolkit_I18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since  0.1.0
	 * @access private
	 */
	private function set_locale() {

		$plugin_i18n = new Portfolio_Toolkit_I18n();

		// Load text domain.
		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register 'portfolio' post type.
	 *
	 * @since  0.1.0
	 * @access private
	 */
	private function define_cpt_hooks() {

		$plugin_cpt = new Portfolio_Toolkit_CPT();

		// Add post type.
		$this->loader->add_action( 'init', $plugin_cpt, 'post_type' );
		$this->loader->add_action( 'init', $plugin_cpt, 'post_taxonomies', 0 );

	}

	/**
	 * Register meta boxes for portfolio post type.
	 *
	 * @since  0.1.0
	 * @access private
	 */
	private function define_meta_hooks() {

		$plugin_admin_meta = new Portfolio_Toolkit_Admin_Meta();

		// Add Meta Boxes.
		$this->loader->add_action( 'add_meta_boxes', $plugin_admin_meta, 'meta_box' );
		$this->loader->add_action( 'save_post',      $plugin_admin_meta, 'save_data', 1, 2 );

	}

	/**
	 * Register other hooks related to the admin area functionality of the plugin.
	 *
	 * @since  0.1.0
	 * @access private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Portfolio_Toolkit_Admin( $this->get_plugin_name(), $this->get_version() );

		// Add new iamge size, admin column and enqueue admin styles.
		$this->loader->add_action( 'after_setup_theme',                    $plugin_admin, 'add_thumbnail' );
		$this->loader->add_filter( 'manage_portfolio_posts_columns',       $plugin_admin, 'post_type_admin_columns' );
		$this->loader->add_action( 'manage_portfolio_posts_custom_column', $plugin_admin, 'post_type_admin_columns_content', 10, 2 );
		$this->loader->add_action( 'admin_enqueue_scripts',                $plugin_admin, 'enqueue_styles' );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since 0.1.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since  0.1.0
	 * @return string The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since  0.1.0
	 * @return Portfolio_Toolkit_Loader Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since  0.1.0
	 * @return string The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}
}
