<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://dmitrymayorov.com/
 * @since      1.0.0
 *
 * @package    Portfolio_Toolkit
 * @subpackage Portfolio_Toolkit/admin
 */

/**
 * Creates metaboxes for Portfolio post type
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Portfolio_Toolkit
 * @subpackage Portfolio_Toolkit/admin
 * @author     Dmitry Mayorov <iamdmitrymayorov@gmail.com>
 */
class Portfolio_Toolkit_Admin_Meta {

	/**
	 * The ID of this plugin.
	 *
	 * @since  1.0.0
	 * @access private
	 * @var    string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since  1.0.0
	 * @access private
	 * @var    string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 1.0.0
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version     The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Returns array of fields.
	 *
	 * @since 1.0.0
	 */
	public function get_fields() {
		$fields = array (
			'client' => array(
				'title' => __( 'Client', 'portfolio-toolkit' ),
				'name'  => '_portfolio_toolkit_project_client',
				'type'  => 'text',
				'id'    => 'portfolio_toolkit_project_client',
				'class' => 'large-text',
				'desc'  => __( 'Who was the client? Example: Apple', 'portfolio-toolkit' ),
				'sntz'  => 'text',
			),
			'date' => array(
				'title' => __( 'Date', 'portfolio-toolkit' ),
				'name'  => '_portfolio_toolkit_project_date',
				'type'  => 'text',
				'id'    => 'portfolio_toolkit_project_date',
				'class' => 'large-text',
				'desc'  => sprintf( __( 'When was the project completed? Example: %s', 'portfolio-toolkit' ), date( 'M Y' ) ),
				'sntz'  => 'text',
			),
			'url' => array(
				'title' => __( 'URL', 'portfolio-toolkit' ),
				'name'  => '_portfolio_toolkit_project_url',
				'type'  => 'text',
				'id'    => 'portfolio_toolkit_project_url',
				'class' => 'large-text',
				'desc'  => __( 'Link to a live project. Example: http://www.apple.com', 'portfolio-toolkit' ),
				'sntz'  => 'url',
			),
		);
		
		return $fields;
	}

	/**
	 * Registers Metabox.
	 *
	 * @since 1.0.0
	 */
	public function meta_box() {
		add_meta_box(
			'portfolio_toolkit_project_details',
			__( 'Project Details', 'portfolio-toolkit' ),
			array( $this, 'display_fields' ),
			'portfolio',
			'normal'
		);
	}

	/**
	 * Displays Metaboxes.
	 * 
	 * @since 1.0.0
	 */
	public function display_fields() {

		foreach ( $this->get_fields() as $field ) {
			// Get data if it was already set.
			$value = get_post_meta( get_the_ID(), $field['name'], true );

			// Extract variables.
			extract( $field );

			// Display input depending on a field sanitization method.
			require plugin_dir_path( __FILE__ ) . 'partials/portfolio-toolkit-admin-display-' .  $field['sntz'] . '.php';
		}

		// Output nonce.
		wp_nonce_field( plugin_basename( __FILE__ ), '_portfolio_toolkit_nonce' );

	}

    /**
	 * Saves Metabox data to a database.
	 * 
	 * @since 1.0.0
	 */
	public function save_data( $post_id, $post ) {
		// Check if nonce is set.
		if ( ! isset( $_POST['_portfolio_toolkit_nonce'] ) )
			return;
		
		// In case it is, verify it.
		if ( ! wp_verify_nonce( $_POST['_portfolio_toolkit_nonce'], plugin_basename( __FILE__ ) ) )
			return;

		// Return if it is a revision or autosave.
		if ( wp_is_post_autosave( $post->ID ) || wp_is_post_revision( $post->ID ) )
			return;

		// Is the user allowed to edit the post or page?
		if ( ! current_user_can( 'edit_post', $post->ID ) )
			return;

		// Loop through meta array, saving or deleting data.
		foreach ( $this->get_fields() as $field ) {
			if ( isset( $_POST[ $field['name'] ] ) ) {
				
				// Sanitize and save data.
				if ( $field['sntz'] == 'url' ) {
					$value = esc_url_raw( $_POST[ $field['name'] ] );
				} else {
					$value = sanitize_text_field( $_POST[ $field['name'] ] );
				}
				update_post_meta( $post->ID, $field['name'], $value );

			} else {
				delete_post_meta( $post->ID, $field['name'] );
			}
			
		}

	}

}
