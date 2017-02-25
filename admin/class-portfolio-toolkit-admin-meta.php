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
 * Creates metaboxes for Portfolio post type
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Portfolio Toolkit
 * @subpackage Portfolio Toolkit/admin
 * @author     Dmitry Mayorov <hello@dmtrmrv.com>
 */
class Portfolio_Toolkit_Admin_Meta {

	/**
	 * Returns array of fields.
	 *
	 * @since 0.1.0
	 */
	public function get_fields() {
		$fields = array(
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
				'desc'  => sprintf( __( 'When was the project completed? Example: %s', 'portfolio-toolkit' ), date( 'F Y' ) ),
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
	 * @since 0.1.0
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
	 * @since 0.1.0
	 */
	public function display_fields() {

		foreach ( $this->get_fields() as $field ) {
			// Get data if it was already set.
			$value = get_post_meta( get_the_ID(), $field['name'], true );

			// Display input.
			echo '<div class="ptk-field-wrap">';

			printf(
				'<label for="%1$s"><strong>%2$s</strong></label>',
				esc_attr( $field['name'] ),
				esc_html( $field['title'] )
			);

			printf( '<input name="%1$s" type="%2$s" value="%3$s" class="%4$s" placeholder="%5$s"> ',
				esc_attr( $field['name'] ),
				esc_attr( $field['type'] ),
				esc_attr( $value ),
				esc_attr( $field['class'] ),
				esc_attr( $field['desc'] )
			);

			echo '</div>';
		}

		// Output nonce.
		wp_nonce_field( plugin_basename( __FILE__ ), '_portfolio_toolkit_nonce' );

	}

	/**
	 * Saves Metabox data to a database.
	 *
	 * @param int    $post_id ID of the post we are working with.
	 * @param object $post    Post object.
	 * @since 0.1.0
	 */
	public function save_data( $post_id, $post ) {
		// Check if nonce is set.
		if ( ! isset( $_POST['_portfolio_toolkit_nonce'] ) ) {
			return;
		}

		// In case it is, verify it.
		$nonce = sanitize_key( $_POST['_portfolio_toolkit_nonce'] );
		if ( ! wp_verify_nonce( $nonce, plugin_basename( __FILE__ ) ) ) {
			return;
		}

		// Return if it is a revision or autosave.
		if ( wp_is_post_autosave( $post->ID ) || wp_is_post_revision( $post->ID ) ) {
			return;
		}

		// Is the user allowed to edit the post or page?
		if ( ! current_user_can( 'edit_post', $post->ID ) ) {
			return;
		}

		// Loop through meta array, saving or deleting data.
		foreach ( $this->get_fields() as $field ) {
			if ( isset( $_POST[ $field['name'] ] ) ) {

				// Sanitize and save data.
				if ( 'url' == $field['sntz'] ) {
					$value = esc_url_raw( wp_unslash( $_POST[ $field['name'] ] ) );
				} else {
					$value = sanitize_text_field( wp_unslash( $_POST[ $field['name'] ] ) );
				}
				update_post_meta( $post->ID, $field['name'], $value );

			} else {
				delete_post_meta( $post->ID, $field['name'] );
			}
		}

	}
}
