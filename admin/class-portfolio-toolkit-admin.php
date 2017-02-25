<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://dmtrmrv.com
 * @since      0.1.0
 *
 * @package    Portfolio Toolkit
 * @subpackage Portfolio Toolkit/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Portfolio Toolkit
 * @subpackage Portfolio Toolkit/admin
 * @author     Dmitry Mayorov <hello@dmtrmrv.com>
 */
class Portfolio_Toolkit_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since  0.1.0
	 * @access private
	 * @var    string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since  0.1.0
	 * @access private
	 * @var    string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 0.1.0
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version     The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Adds image size for dashboard use.
	 *
	 * @since 0.1.0
	 */
	public function add_thumbnail() {
		add_image_size( 'portfolio-toolkit-thumbnail', 100, 100, true );
	}

	/**
	 * Gets featured image.
	 *
	 * @param int $id Post ID.
	 * @since 0.1.0
	 */
	public function post_type_get_featured_image( $id ) {
		$featured_image_id = get_post_thumbnail_id( $id );

		if ( $featured_image_id ) {
			$post_thumbnail_img = wp_get_attachment_image_src( $featured_image_id, 'portfolio-toolkit-thumbnail' );
			return $post_thumbnail_img[0];
		}
	}

	/**
	 * Adds image column to Portfolio post listing screen.
	 *
	 * @param array $columns Columns in the posts table in the Dashboard.
	 * @since 0.1.0
	 */
	public function post_type_admin_columns( $columns ) {
		// Change 'Title' to 'Project'.
		$columns['title'] = __( 'Project', 'portfolio-toolkit' );

		// Add Image column if current theme supports thumbnails.
		if ( current_theme_supports( 'post-thumbnails' ) ) {
			$columns = array_slice( $columns, 0, 1, true ) +
		               array( 'portfolio-toolkit-thumbnail' => __( 'Image', 'portfolio-toolkit' ) ) +
		               array_slice( $columns, 1, null, true );
		}

		return $columns;
	}

	/**
	 * Displays Featured image or a placeholder.
	 *
	 * @param string $column_name Name of the column where to put featured image.
	 * @param int    $id          Post ID.
	 * @since 0.1.0
	 */
	public function post_type_admin_columns_content( $column_name, $id ) {
		// Quick return if current theme does not support thumbnails.
		if ( ! current_theme_supports( 'post-thumbnails' ) ) {
			return;
		}

		if ( 'portfolio-toolkit-thumbnail' == $column_name ) {

			// Try to get featured image ID.
			$post_featured_image = $this->post_type_get_featured_image( $id );

			// Build an 'edit post' link.
			printf( '<a href="%s">', esc_url( get_edit_post_link( $id ) ) );

			// Display image or placeholder.
			if ( $post_featured_image ) {
				printf( '<img src="%s">', esc_url( $post_featured_image ) );
			} else {
				echo '<span class="no-image dashicons dashicons-format-image">';
			}

			echo '</a>';

		}

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since 0.1.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style(
			$this->plugin_name . '-css',
			plugin_dir_url( __FILE__ ) . 'css/portfolio-toolkit-admin.css',
			array(), $this->version,
			'all'
		);

	}
}
